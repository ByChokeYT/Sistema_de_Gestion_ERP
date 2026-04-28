<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('invoice_number');
            $table->string('cuf')->unique()->nullable()->comment('Código Único de Factura - SIAT');
            $table->string('cufd')->nullable()->comment('Código Único de Facturación Diaria - SIAT');
            $table->string('control_code')->nullable()->comment('Código de Control (V.4)');
            $table->timestamp('emission_date');
            $table->decimal('total_amount', 15, 2);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('taxable_amount', 15, 2);
            $table->string('status')->default('Vigente'); // Vigente, Anulada
            $table->string('payment_method')->default('Efectivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
