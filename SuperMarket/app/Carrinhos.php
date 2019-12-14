<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinhos extends Model
{
	protected $fillable = [ 'nome_produto' , 'preco_produto', 'quantidade'];
	
	public function produto() {
		return $this->hasMany('App\Produtos');
	}
}



