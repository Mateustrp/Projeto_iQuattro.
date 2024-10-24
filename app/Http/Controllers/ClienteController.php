<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.incluir');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|min:1|max:6',
            'nome' => 'required|max:60',
            'pessoa' => 'required|in:J,F,O',
            'cnpj' => 'nullable|size:14',
            'estado' => 'required|size:2',
            'data_nascimento' => 'required|date',
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso');
    }

    /**
     * Display the specified resource.  
     */
    public function show(Cliente $cliente)
    {
        $produtos = $cliente->produtos;
        $produtosDisponiveis = Produto::whereNotIn('codigo', $produtos->pluck('codigo'))->get();

        return view('clientes.vizualiza', compact('cliente', 'produtos', 'produtosDisponiveis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar($codigo)
    {
        $cliente = Cliente::where('codigo', $codigo)->first();
        if (!$cliente) {
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado.');
        }
        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $codigo)
    {
        $cliente = Cliente::findOrFail($codigo);

        $request->validate([
            'nome' => 'required|max:60',
            'pessoa' => 'required|in:J,F,O',
            'cnpj' => 'nullable|size:14',
            'estado' => 'required|size:2',
            'data_nascimento' => 'required|date',
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cadastro do cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso');
    }

    /**
     * Show the form to associate products with a client.
     */

    public function associarProdutos($id)
    {
        return $this->associarProduto($id); 
    }

    public function associarProduto($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }
        $produtosDisponiveis = Produto::whereNotIn('codigo', $cliente->produtos()->pluck('codigo'))->get(); // Exclui produtos já associados
    
        return view('associação.Produto_Cliente', compact('cliente', 'produtosDisponiveis'));
    }
    

    /**
     * Associate products with the specified client.
     */
    public function associar(Request $request, $clienteCodigo)
    {
        $cliente = Cliente::findOrFail($clienteCodigo);
    
        $request->validate([
            'produtos' => 'required|array',
            'produtos.*' => 'exists:produtos,codigo'
        ]);
    
        if ($request->has('produtos')) {
            $cliente->produtos()->sync($request->produtos);
        }
    
        return redirect()->route('clientes.show', $clienteCodigo)->with('success', 'Produtos associados com sucesso!');
    }


    public function associarStore(Request $request, $clienteCodigo)
    {
        $cliente = Cliente::findOrFail($clienteCodigo);
        
        $request->validate([
            'produtos' => 'required|array',
            'produtos.*' => 'exists:produtos,codigo'
        ]);
        
        if ($request->has('produtos')) {
            $cliente->produtos()->sync($request->produtos);   }
    
        return redirect()->route('clientes.vizualiza', $clienteCodigo)->with('success', 'Produtos associados com sucesso!');
    }
    
    
    
}
