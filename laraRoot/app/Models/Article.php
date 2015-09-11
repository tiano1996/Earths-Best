<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/*
	 * Article model :
	 */
    protected $table='articles';
    public $timestamps=false;
    public function comment(){
        return $this->hasMany('App\Models\Comment')->orderBy('created_at', 'desc');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
