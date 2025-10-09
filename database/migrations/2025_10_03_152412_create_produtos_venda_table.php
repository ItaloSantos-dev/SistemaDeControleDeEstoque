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
        Schema::create('produto_venda', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('produto_id');
            $table ->unsignedBigInteger('venda_id');
            $table ->integer('quantidade');

            $table->decimal('valor_total', 6,2);
            $table->decimal('produto_preco', 6,2);
            $table->string('forma', 10);
            $table->date('data');
            $table->timestamps();

            $table ->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

            $table ->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_venda');
    }
};
