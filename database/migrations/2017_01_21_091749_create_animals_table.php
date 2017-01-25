<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->boolean('adopted')->default(false);
            $table->string('gender');
            $table->string('animalType');
            $table->boolean('castrated')->default(false);
            $table->boolean('dewormed')->default(false);
            $table->boolean('vaccinated')->default(false);
            $table->integer('years')->nullable();
            $table->integer('months')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
