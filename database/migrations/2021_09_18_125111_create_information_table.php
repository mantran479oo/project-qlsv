<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('student_code')->unsigned();
            $table->string('name');
            $table->date('date');
            $table->string('olds');
            $table->string('hobby');
            $table->binary('gender');
            $table->string('class_code');
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
        Schema::dropIfExists('informations');
    }
}
