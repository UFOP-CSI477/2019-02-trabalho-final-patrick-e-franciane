<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrinhos;
use App\Produtos;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carrinho = Carrinhos::where('cliente_id' , '=' , auth()->user()->id)->get();
        return view('carrinho',['carrinho' => $carrinho]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrinho = Produtos::where('id', '=', $request->id)->first();
        $c = new Carrinhos;
        $c->nome_produto = $carrinho->nome;
        $c->cliente_id = auth()->user()->id;
        $c->preco_produto = $carrinho->preco;
        $c->quantidade = 1;
        $c->save();  
        //Requests::create($request->all());
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carrinho_update = Carrinhos::where('id' , '=' , $id)->first();

        $carrinho_update->fill([
            'quantidade' => $request->quantidade
        ]);

        $carrinho_update->save();
        return redirect('carrinho');
    }
    public function destroy($id)
    {
        $carrinho_delete = Carrinhos::where('nome_produto', '=', $id)->first();
        $carrinho_delete->delete();
        return redirect('carrinho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
