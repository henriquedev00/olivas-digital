<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Telefone;
use App\Models\Cliente;

class TelefoneController extends Controller
{
    private $telefone;

    public function __construct(Telefone $telefone)
    {
        $this->telefone = $telefone;
    }

    public function showTelefones($clienteID)
    {
        $cliente = Cliente::findOrFail($clienteID);

        $telefones = $cliente->getTelefones;

        $json['telefones'] = $telefones;

        return response()->json($json);
    }
}
