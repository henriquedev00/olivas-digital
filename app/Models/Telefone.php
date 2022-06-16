<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $table = 'telefones';

    protected $fillable = ['telefone'];

    public function getClientes()
    {
        return $this->belongsToMany(Cliente::class, 'cliente_telefone');
    }
}
