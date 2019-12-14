<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produtos::orderBy('nome')->get();
        return view('home',['produtos' => $produtos]);
    }
    public function returnMerc()
    {
        $produtos = Produtos::where('tipo', '=' , 'Mercearia')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnHort()
    {
        $produtos = Produtos::where('tipo', '=' , 'Hortifruti')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnPad()
    {
        $produtos = Produtos::where('tipo', '=' , 'Padaria')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnBeb()
    {
        $produtos = Produtos::where('tipo', '=' , 'Bebidas')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnAcou()
    {
        $produtos = Produtos::where('tipo', '=' , 'Açougue')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnHig()
    {
        $produtos = Produtos::where('tipo', '=' , 'Higiene e Beleza')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnLim()
    {
        $produtos = Produtos::where('tipo', '=' , 'Limpeza')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnInf()
    {
        $produtos = Produtos::where('tipo', '=' , 'Infantil')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnEle()
    {
        $produtos = Produtos::where('tipo', '=' , 'Eletrodomésticos')->get();
        return view('home', ['produtos' => $produtos]);
    }
    public function returnPesquisa(Request $request)
    {
        if(empty($request->pesquisa)){
            return view('home');
        }
        else{
            $produtos = Produtos::where('nome', '=', $request->pesquisa)->orderBy('nome')->get();
            return view('home',['produtos' => $produtos]);
        }
    }
}
