<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Conversation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function(Blueprint $table){
          $table->increments('id');
          //user
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          //contact
          $table->unsignedInteger('contact_id');
          $table->foreign('contact_id')->references('id')->on('users');
          //last_message - last_time
          $table->text('last_message')->nullable();
          $table->dateTime('last_time')->nullable();
          //listen_notifications
          $table->boolean('listen_notifications')->default(true);
          //has-blocked
          $table->boolean('has_blocked')->default(true);
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
