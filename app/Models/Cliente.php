<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome', 'email', 'imagem', 'tipoCliente_id'];

    public function getResults()
    {
        return Cliente::all();
    }

    public function getResult($id)
    {
        return Cliente::findOrFail($id);
    }

    public function getTipoCliente()
    {
        return $this->belongsTo(TipoCliente::class, 'tipoCliente_id');
    }

    public function getTelefones()
    {
        return $this->belongsToMany(Telefone::class, 'cliente_telefone', 'cliente_id', 'telefone_id');
    }
}
