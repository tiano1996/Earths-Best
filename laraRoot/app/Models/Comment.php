<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
     * Comment model
     * belongsTo Events
     */
    public $timestamps=true;
    protected $table='comments';
    protected $fillable = ['nickname', 'email', 'content'];
    public function article(){
        $this->belongsTo('\App\Models\Article');
    }
}
