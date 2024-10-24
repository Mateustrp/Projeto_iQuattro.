<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'nome',
        'pessoa',
        'cnpj',
        'estado',
        'data_nascimento',
    ];

    
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'cliente_produto', 'codigo_cliente', 'codigo_produto');
    }
    
}
