<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsReplyCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reply_comment', function (Blueprint $table){
			$table->bigIncrements('id_reply');
			$table->bigInteger('id_cm');	
			$table->bigInteger('id');
			$table->bigInteger('user_id');
			$table->integer('comment_reply');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
