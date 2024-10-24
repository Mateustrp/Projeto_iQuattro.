<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['codigo', 'descricao', 'preco', 'imposto'];

   
    public function clientes()
{
    return $this->belongsToMany(Cliente::class, 'cliente_produto', 'codigo_produto', 'codigo_cliente');
}

    public function getValorImpostoAttribute()
    {
        return $this->preco * ($this->imposto / 100);
    }
}
