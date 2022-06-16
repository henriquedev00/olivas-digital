<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Telefone;
use App\Models\TipoCliente;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente, Telefone $telefone)
    {
        $this->cliente = $cliente;
    }
    
    public function index()
    {
        $clientes = $this->cliente->getResults();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $tiposCliente = TipoCliente::all();

        return view('clientes.create', compact('tiposCliente'));
    }

    public function store(StoreClienteRequest $request)
    {
        $pathImagem = $request->file('imagem')->store('imagensClientes');
        $dadosCliente = [
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'imagem' => $pathImagem,
            'tipoCliente_id' => $request->get('tipoCliente'),
        ];

        $cliente = $this->cliente;

        $telefones = $request->get('telefone');

        try {
            $cliente = $cliente->create($dadosCliente);

            foreach($telefones as $telefone) {
                if($telefone != null) {
                    $telefone = Telefone::create([
                        'telefone' => $telefone
                    ]);
                    $cliente->getTelefones()->attach($telefone->id);
                } else {
                    continue;
                }
            }

            $json['route'] =  route('admin.cliente.show', ['id' => $cliente->id]);

            return response()->json($json);
        } catch(QueryException $exception) {
            $mensagem = $exception->getMessage();

            Log::info($exception);
                        
            $json['erro'] =  $exception->getMessage();

            return response()->json($json);
        }
    }

    public function show($id)
    {
        $cliente = $this->cliente->getResult($id);

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = $this->cliente->getResult($id);
        $tiposCliente = TipoCliente::all();

        return view('clientes.edit', compact('cliente', 'tiposCliente'));
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        if($request->file('imagem')) {
            $pathImagem = $request->file('imagem')->store('imagensClientes');

            $dadosCliente = [
                'nome' => $request->get('nome'),
                'email' => $request->get('email'),
                'imagem' => $pathImagem,
                'tipoCliente_id' => $request->get('tipoCliente'),
            ];
        } else {
            $dadosCliente = [
                'nome' => $request->get('nome'),
                'email' => $request->get('email'),
                'tipoCliente_id' => $request->get('tipoCliente'),
            ];
        }

        $cliente = $this->cliente->getResult($id);

        try {
            $cliente->update($dadosCliente);

            $clienteTelefones = $cliente->getTelefones->toArray();
            $clienteTelefones = collect($clienteTelefones);
            $clienteTelefonesArray = [];

            $inputsTelefone = $request->get('telefone');
            $inputsTelefoneArray = [];

            $inserirTelefones = [];

            foreach($clienteTelefones as $key => $clienteTelefone) {
                array_push($clienteTelefonesArray, Arr::only($clienteTelefone, ['id', 'telefone']));
            }
            foreach($inputsTelefone as $key => $inputTelefone) {
                array_push($inputsTelefoneArray, ['id' => $key, 'telefone' => $inputTelefone]);
            }

            $clienteTelefonesArray = collect($clienteTelefonesArray);
            $inputsTelefoneArray =  collect($inputsTelefoneArray);
            
            foreach($inputsTelefoneArray as $key => $inputTelefone) {
                if(!$clienteTelefonesArray->contains('telefone', $inputTelefone['telefone']) && $inputTelefone['telefone'] != null) {
                    $telefone = Telefone::create([
                        'telefone' => $inputTelefone['telefone']
                    ]);
                    $cliente->getTelefones()->attach($telefone->id);
                } elseif($inputTelefone['telefone'] == null) {
                    if($cliente->getTelefones->count() > 1) {
                        $cliente->getTelefones()->detach($inputTelefone['id']);
                        $telefone = Telefone::destroy($inputTelefone['id']);
                    }
                }
            }

            return redirect()->route('admin.cliente.show', ['id' => $id]);
        } catch(QueryException $exception) {
            $mensagem = $exception->getMessage();

            Log::info($exception);
            
            return view('erros.index', compact('mensagem'));
        }
    }

    public function destroy($id)
    {
        $cliente = $this->cliente->getResult($id);

        $telefones = $cliente->getTelefones;

        try {
            foreach($telefones as $telefone) {
                $cliente->getTelefones()->detach($telefone->id);
                $telefone->delete();
            }
            $cliente->delete();

            return redirect()->route('admin.cliente.index');
        } catch(QueryException $exception) {
            $mensagem = $exception->getMessage();

            Log::info($exception);
            
            return view('erros.index', compact('mensagem'));
        }
    }
}
