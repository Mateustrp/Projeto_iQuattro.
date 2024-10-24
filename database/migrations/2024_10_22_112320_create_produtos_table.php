<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->string('codigo', 15)->primary();
            $table->string('descricao',45);
            $table->decimal('preco', 10, 2);
            $table->decimal('imposto', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
