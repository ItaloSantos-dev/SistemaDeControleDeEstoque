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
        Schema::create('produtos_venda', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total', 6,2);
            $table->decimal('produto_preco', 6,2);
            $table->string('forma', 10);
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_venda');
    }
};
