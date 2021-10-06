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
            $table->integer('id')->nullable();
            $table->integer('student_code')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('olds')->nullable();
            $table->string('hobby')->nullable();
            $table->binary('address')->nullable();
            $table->binary('gender')->nullable();
            $table->string('class_code')->nullable();
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
