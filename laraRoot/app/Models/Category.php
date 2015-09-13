<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /*
     * Article model :
     */
    protected $table='article_categories';
    public $timestamps=false;
    public function article(){
        return $this->hasMany('App\Models\Article','category_id','id')->orderBy('sort', 'desc');
    }
}
