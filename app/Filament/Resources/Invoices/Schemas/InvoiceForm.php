<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('invoice_number')
                    ->required()
                    ->numeric(),
                TextInput::make('cuf'),
                TextInput::make('cufd'),
                TextInput::make('control_code'),
                DateTimePicker::make('emission_date')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('discount_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('taxable_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('Vigente'),
                TextInput::make('payment_method')
                    ->required()
                    ->default('Efectivo'),
            ]);
    }
}
