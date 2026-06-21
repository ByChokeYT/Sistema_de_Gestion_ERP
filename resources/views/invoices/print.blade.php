<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Imprimir Factura #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 10px;
            width: 76mm; /* Ancho estándar de ticket */
            background-color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .header {
            margin-bottom: 10px;
        }
        .header h2 {
            font-size: 15px;
            margin: 5px 0;
            font-weight: bold;
        }
        .header p {
            margin: 2px 0;
            font-size: 11px;
        }
        .separator {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .info-table, .items-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        .info-table td {
            padding: 2px 0;
            vertical-align: top;
        }
        .items-table th {
            border-bottom: 1px dashed #000;
            text-align: left;
            padding: 3px 0;
            font-size: 11px;
        }
        .items-table td {
            padding: 4px 0;
            vertical-align: top;
            font-size: 11px;
        }
        .totals-table {
            width: 100%;
            margin-top: 5px;
            font-size: 11px;
        }
        .totals-table td {
            padding: 2px 0;
        }
        .totals-table .amount {
            font-weight: bold;
        }
        .footer {
            margin-top: 15px;
            font-size: 10px;
        }
        .qr-container {
            margin: 10px 0;
            display: flex;
            justify-content: center;
        }
        .qr-container img {
            width: 120px;
            height: 120px;
        }
        @media print {
            body {
                width: 76mm;
            }
            @page {
                margin: 0;
            }
        }
    </style>
</head>
<body>

    <div class="text-center header">
        <h2>ERP BOLIVIA S.R.L.</h2>
        <p>Casa Matriz</p>
        <p>Av. 20 de Octubre #2312, La Paz</p>
        <p>Teléfono: 2240938</p>
        <p>La Paz - Bolivia</p>
        
        <div class="separator"></div>
        
        <p><strong>NIT:</strong> 304859024</p>
        <p><strong>FACTURA NRO:</strong> {{ $invoice->invoice_number }}</p>
        <p><strong>CÓD. AUTORIZACIÓN (CUF):</strong></p>
        <p style="word-break: break-all; font-size: 10px;">{{ $invoice->cuf }}</p>
    </div>

    <div class="separator"></div>

    <table class="info-table">
        <tr>
            <td><strong>Fecha:</strong></td>
            <td class="text-right">{{ \Carbon\Carbon::parse($invoice->emission_date)->format('d/m/Y H:i:s') }}</td>
        </tr>
        <tr>
            <td><strong>Nombre/Razón Social:</strong></td>
            <td class="text-right">{{ $invoice->customer->name ?? 'Sin Nombre' }}</td>
        </tr>
        <tr>
            <td><strong>NIT/CI:</strong></td>
            <td class="text-right">{{ $invoice->customer->nit_ci ?? '0' }}</td>
        </tr>
    </table>

    <div class="separator"></div>

    <table class="items-table">
        <thead>
            <tr>
                <th>Detalle</th>
                <th class="text-center">Cant</th>
                <th class="text-right">P.U.</th>
                <th class="text-right">Subt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td class="text-center">{{ number_format($item->quantity, 0) }}</td>
                    <td class="text-right">{{ number_format($item->unit_price, 2) }}</td>
                    <td class="text-right">{{ number_format($item->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="separator"></div>

    <table class="totals-table">
        <tr>
            <td>SUBTOTAL Bs.</td>
            <td class="text-right">{{ number_format($invoice->total_amount + $invoice->discount_amount, 2) }}</td>
        </tr>
        <tr>
            <td>DESCUENTO Bs.</td>
            <td class="text-right">-{{ number_format($invoice->discount_amount, 2) }}</td>
        </tr>
        <tr style="font-weight: bold; font-size: 12px;">
            <td>TOTAL Bs.</td>
            <td class="text-right amount">{{ number_format($invoice->total_amount, 2) }}</td>
        </tr>
        <tr>
            <td style="font-size: 10px;">MONTO SUJETO A CRÉDITO FISCAL Bs.</td>
            <td class="text-right amount" style="font-size: 10px;">{{ number_format($invoice->taxable_amount, 2) }}</td>
        </tr>
    </table>

    <div class="separator"></div>

    <div class="footer text-center">
        <p><strong>CÓDIGO DE CONTROL:</strong> {{ $invoice->control_code }}</p>
        <p>ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY.</p>
        <p style="font-style: italic; margin-top: 5px;">"Ley N° 453: El proveedor deberá entregar el producto en las condiciones acordadas."</p>
        
        <div class="qr-container">
            <!-- QR code api simulation -->
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode('https://siat.impuestos.gob.bo/consulta/QR?nit=304859024&cuf=' . $invoice->cuf . '&numero=' . $invoice->invoice_number . '&monto=' . $invoice->total_amount) }}" alt="Código QR Fiscal">
        </div>
        
        <p style="font-size: 9px; margin-top: 5px;">SIAT - FACTURACIÓN COMPUTARIZADA</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
