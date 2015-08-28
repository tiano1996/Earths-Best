<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/*
	 * Article model :
	 */
    protected $table='articles';

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

}
