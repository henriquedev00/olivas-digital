<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    use HasFactory;

    protected $table = 'tipo_cliente';

    protected $fillable = ['tipoCliente'];

    public function getClientes()
    {
        return $this->hasMany(Cliente::class, 'cliente_telefone', 'telefone_id', 'cliente_id');
    }
}
