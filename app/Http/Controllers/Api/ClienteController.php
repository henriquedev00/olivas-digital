<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Http\Requests\StoreUpdateClienteRequest;
use App\Http\Resources\ClienteResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->getResults();

        return new ClienteResource($clientes);
    }

    public function show($id)
    {
        $cliente = $this->cliente->getResult($id);

        return new ClienteResource($cliente);
    }
}
