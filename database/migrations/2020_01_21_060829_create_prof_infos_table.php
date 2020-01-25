<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qualification');
            $table->integer('year_of_passing');
            $table->string('work_desig');
            $table->string('company');
            $table->integer('from_year');
            $table->integer('to_year');
            $table->timestamps();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prof_infos');
    }
}
