<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounties', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedinteger('bounty_category_id')->nullable();
            $table->foreign('bounty_category_id')->references('id')->on('bounty_categories');
            $table->string('image')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->unsignedBiginteger('user_id');
            $table->string('file')->nullable();
            $table->string('status');
            $table->text('url')->nullable();
             $table->string('reward');
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
        Schema::dropIfExists('bounties');
    }
}
