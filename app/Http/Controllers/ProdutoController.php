<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all(); // Recupera todos os produtos do banco de dados
        return view('produtos.index', compact('produtos')); // Retorna a view com os produtos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create'); // Retorna a view para criar um novo produto
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]); // Valida os dados do formulário

        $produto = Produto::create($dados); // Cria um novo produto com os dados do formulário validados
        return redirect()->route('produtos.index'); // Redireciona para a lista de produtos

    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        Produto::find($produto->id); // Recupera o produto específico do banco de dados
        return view('produtos.show', compact('produto')); // Retorna a view com os detalhes do produto
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto')); // Retorna a view para editar o produto
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]); // Valida os dados do formulário

        $produto->update($dados); // Atualiza o produto com os dados do formulário validados

        return redirect()->route('produtos.index')->with('message', 'Produto atualizado com sucesso!'); // Redireciona para a lista de produtos
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete(); // Exclui o produto do banco de dados
        return redirect()->route('produtos.index')->with('message', 'Produto excluído com sucesso!'); // Redireciona para a lista de produtos
    }
}
