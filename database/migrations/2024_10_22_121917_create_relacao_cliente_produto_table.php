<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacaoClienteProdutoTable extends Migration
{
    public function up()    
    {
        Schema::create('cliente_produto', function (Blueprint $table) { 
            $table->string('codigo_cliente', 6); 
            $table->string('codigo_produto', 15);  

            $table->foreign('codigo_cliente')->references('codigo')->on('cliente')->onDelete('cascade');  
            $table->foreign('codigo_produto')->references('codigo')->on('produtos')->onDelete('cascade'); 

            $table->primary(['codigo_cliente', 'codigo_produto']); 
        });   
    }   

    public function down()
    {
        Schema::dropIfExists('cliente_produto');
    }
}
