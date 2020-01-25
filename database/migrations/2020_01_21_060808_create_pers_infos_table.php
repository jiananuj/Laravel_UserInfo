<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pers_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('about');
            $table->string('profile_image');
            $table->date('dob');
            $table->string('gender');
            $table->timestamps();
            $table->biginteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pers_infos');
    }
}
