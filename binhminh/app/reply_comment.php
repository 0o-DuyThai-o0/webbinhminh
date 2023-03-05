<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class reply_comment extends Model {

	protected $table = 'reply_comment';
    protected $fillable = [
		'id_cm',
        'id',
        'user_id',
        'comment_reply'
    ] ;

}
