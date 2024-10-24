<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::paginate(10);
        return view('produtos.index', compact('produtos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.incluir');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'codigo' => 'required|min:1|max:15|unique:produtos,codigo',
            'descricao' => 'required|max:45',
            'preco' => 'required|numeric|min:0',
            'imposto' => 'required|numeric|min:0|max:100',
        ]);

        Produto::create([
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imposto' => $request->imposto,
        ]);


        return redirect()->route('produtos.index')->with('success', 'Produto criado com successo');
    }


    /**
     * Display the specified resource.
     */

    public function show($codigo)
    {
        $produto = Produto::where('codigo', $codigo)->firstOrFail();
        $clientes = $produto->clientes;
        return view('produtos.vizualiza', compact('produto', 'clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($codigo)
    {
        $produto = Produto::findOrFail($codigo);
        return view('produtos.editar', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $codigo)
    {
        $produto = Produto::findOrFail($codigo);
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->imposto = $request->input('imposto');

        $produto->save();
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluido com sucesso');
    }


    public function associar($codigoProduto)
    {
        $produto = Produto::where('codigo', $codigoProduto)->firstOrFail();
        $clientes = Cliente::all();

        return view('associação.associar_produtos', compact('produto', 'clientes'));
    }

    public function associarStore(Request $request, $produtoCodigo)
    {
        $request->validate([
            'cliente_codigo' => 'required|array',
            'cliente_codigo.*' => 'exists:cliente,codigo', 
        ]);
        $produto = Produto::where('codigo', $produtoCodigo)->firstOrFail();
        $produto->clientes()->syncWithoutDetaching($request->cliente_codigo);

        return redirect()->route('produtos.index')->with('success', 'Clientes associados ao produto com sucesso!');
    }
}
