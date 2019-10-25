<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FapHousesDatesRanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('fap_houses_dates_ranges', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('house_id');
		    $table->date('from');
		    $table->date('to');
		    $table->longText('params')->default(NULL);
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
        //
    }
}
