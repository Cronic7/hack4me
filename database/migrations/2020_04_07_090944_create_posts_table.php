<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');
          
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->string('image');
            $table->unsignedInteger('user_id')->default(null);
            $table->foreign('user_id')->references('id')->on('users');
           
            $table->string('status');
             $table->timestamp('published_at')->nullable();
              $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
