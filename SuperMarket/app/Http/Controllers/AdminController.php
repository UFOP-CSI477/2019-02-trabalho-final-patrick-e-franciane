<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::orderBy('nome')->get();
        return view('AdminArea.index',['produtos' => $produtos]);
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

     $p = new Produtos;
     $p->nome = $request->nome;
     $p->preco = $request->preco;
     $p->tipo = $request->tipo;

     if(!is_null($request->imagem)){
         $imagem = $request->imagem;
         $imagemnome = $imagem->getClientOriginalName();
         $imagem->move('uploads' , $imagemnome);
         $p->imagem = $imagemnome;

         $p->save();
     }


     return redirect()->route('AdminArea.index');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCliente(Request $request)
    {
        if(empty($request->nome)){
            return view('AdminArea.index');
        }
        else{
            $cliente = User::where('name' , '=' , $request->nome)->first();
            return view('AdminArea.show',['cliente' => $cliente]);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluiProduto(Request $request)
    {
        $produto = Produtos::where('nome' , '=' , $request->nome)->first();
        $produto->delete();
        return redirect()->route('AdminArea.index');
    }
}
