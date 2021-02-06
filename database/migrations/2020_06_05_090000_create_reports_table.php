<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->Increments('id');
            $table->boolean('is_read')->default(0);
             $table->boolean('is_seen')->default(0);
            $table->string('message');
            $table->unsignedInteger('sender_hacker_user_id')->default(null);
            $table->foreign('sender_hacker_user_id')->references('id')->on('users');
            $table->unsignedInteger('receiver_business_user_id')->default(null);
            $table->foreign('receiver_business_user_id')->references('id')->on('users');
            $table->string('file');
            $table->string('account');
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
        Schema::dropIfExists('reports');
    }
}
