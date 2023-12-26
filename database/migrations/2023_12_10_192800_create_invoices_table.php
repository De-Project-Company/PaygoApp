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
            $table->string('invoice_number')->unique();
            $table->string('customer');
            $table->date('invoice_due_date');
            $table->string('invoice_note')->nullable();
            $table->decimal('invoice_vat', 10, 2); // Adjust precision as needed
            $table->decimal('invoice_discount', 10, 2); // Adjust precision as needed
            $table->decimal('invoice_total', 10, 2); // Adjust precision as needed
            $table->string('payment_method');
            $table->timestamps(); // If you don't need timestamps, you can remove this line
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
