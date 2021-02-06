<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->Increments('id');
         $table->unsignedInteger('user_hacker_id')->nullable();
            $table->foreign('user_hacker_id')->references('id')->on('user_hackers');
             $table->unsignedInteger('user_business_id')->nullable();
            $table->foreign('user_business_id')->references('id')->on('user_businesses');

             $table->unsignedInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports');

             $table->text('message')->nullable();
             $table->integer('rate');
              $table->boolean('is_read')->default(0);
             $table->boolean('is_seen')->default(0);
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
        Schema::dropIfExists('ratings');
    }
}
