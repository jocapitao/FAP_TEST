<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedClubsNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_clubs_names', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('club_name',250);
            $table->string('club_league',250);
            $table->timestamps();
            $table->integer('status')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_clubs_names');
    }
}
