<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

    protected $table = 'comments';
    protected $fillable = [
        'id',
        'user_id',
        'comment_body'
    ] ;
}