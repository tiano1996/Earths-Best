<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
     * Comment model
     * belongsTo Articles
     */
    public $timestamps=false;
    protected $table='comments';
    protected $fillable = ['nickname', 'email', 'content'];
}
