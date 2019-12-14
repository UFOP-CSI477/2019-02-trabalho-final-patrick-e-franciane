<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
	protected $fillable = [ 'nome' , 'preco' , 'tipo' , 'imagem'];

	public function carrinho() {
		return $this->belongsTo('App\Carrinhos');
	}

}

