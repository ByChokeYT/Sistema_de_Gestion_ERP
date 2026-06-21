<?php

namespace App\Filament\Resources\Invoices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('invoice_number')
                    ->label('Nro. Factura')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cuf')
                    ->label('CUF')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('cufd')
                    ->label('CUFD')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('control_code')
                    ->label('Cód. Control')
                    ->searchable(),
                TextColumn::make('emission_date')
                    ->label('Fecha Emisión')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->label('Total')
                    ->numeric(2)
                    ->prefix('Bs. ')
                    ->sortable(),
                TextColumn::make('discount_amount')
                    ->label('Descuento')
                    ->numeric(2)
                    ->prefix('Bs. ')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('taxable_amount')
                    ->label('Monto Gravado')
                    ->numeric(2)
                    ->prefix('Bs. ')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Vigente' => 'success',
                        'Anulada' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('payment_method')
                    ->label('Método Pago')
                    ->searchable(),
                TextColumn::make('siat_status')
                    ->label('Estado SIAT')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Validada' => 'success',
                        'Pendiente' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('validarSiat')
                    ->label('Validar SIAT')
                    ->icon('heroicon-o-cloud-arrow-up')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Enviar Factura a Impuestos Nacionales (SIAT)')
                    ->modalDescription('¿Está seguro de enviar esta factura para su validación digital ante el SIN?')
                    ->modalSubmitActionLabel('Enviar a Impuestos')
                    ->visible(fn ($record) => $record->siat_status === 'Pendiente')
                    ->action(function ($record) {
                        // Simular latencia de red
                        usleep(800000);
                        
                        $customer = $record->customer;
                        $itemsXml = '';
                        foreach ($record->items as $item) {
                            $itemsXml .= "
        <detalle>
            <actividadEconomica>461000</actividadEconomica>
            <codigoProductoSin>51110</codigoProductoSin>
            <codigoProducto>{$item->product_id}</codigoProducto>
            <descripcion>" . htmlspecialchars($item->product_name) . "</descripcion>
            <cantidad>{$item->quantity}</cantidad>
            <unidadMedida>1</unidadMedida>
            <precioUnitario>{$item->unit_price}</precioUnitario>
            <montoDescuento>0.00</montoDescuento>
            <subTotal>{$item->subtotal}</subTotal>
        </detalle>";
                        }

                        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<facturaComputarizadaCompraVenta>
    <cabecera>
        <nitEmisor>304859024</nitEmisor>
        <razonSocialEmisor>ERP BOLIVIA S.R.L.</razonSocialEmisor>
        <municipio>La Paz</municipio>
        <telefono>2240938</telefono>
        <numeroFactura>' . $record->invoice_number . '</numeroFactura>
        <cuf>' . $record->cuf . '</cuf>
        <cufd>' . $record->cufd . '</cufd>
        <codigoSucursal>0</codigoSucursal>
        <direccion>Av. 20 de Octubre #2312</direccion>
        <codigoPuntoVenta>0</codigoPuntoVenta>
        <fechaEmision>' . $record->emission_date . '</fechaEmision>
        <nombreRazonSocial>' . htmlspecialchars($customer->name ?? 'Sin Nombre') . '</nombreRazonSocial>
        <codigoTipoDocumentoIdentidad>1</codigoTipoDocumentoIdentidad>
        <numeroDocumento>' . htmlspecialchars($customer->nit_ci ?? '99001') . '</numeroDocumento>
        <montoTotal>' . $record->total_amount . '</montoTotal>
        <montoTotalSujetoIva>' . $record->taxable_amount . '</montoTotalSujetoIva>
        <codigoMetodoPago>1</codigoMetodoPago>
        <montoDescuento>' . $record->discount_amount . '</montoDescuento>
        <codigoLeyenda>1</codigoLeyenda>
        <leyenda>Ley N° 453: El proveedor deberá entregar el producto en las condiciones acordadas</leyenda>
    </cabecera>
    <detalles>' . $itemsXml . '
    </detalles>
</facturaComputarizadaCompraVenta>';

                        Storage::disk('public')->put("siat/factura_{$record->invoice_number}.xml", $xml);

                        $record->update([
                            'siat_status' => 'Validada',
                        ]);

                        Notification::make()
                            ->title('Factura Validada ante el SIN')
                            ->body('La factura #' . $record->invoice_number . ' ha sido firmada digitalmente y registrada en Impuestos Nacionales.')
                            ->success()
                            ->send();
                    }),
                Action::make('imprimir')
                    ->label('Imprimir')
                    ->icon('heroicon-o-printer')
                    ->color('info')
                    ->url(fn ($record) => route('invoices.print', $record))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
