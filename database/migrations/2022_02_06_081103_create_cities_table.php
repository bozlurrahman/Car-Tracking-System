<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cities');
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('active')->default(0);
            $table->json('description');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('car_id');
            // $table->foreign('car_id')->references('id')->on('cars');

            $table->foreign('user_id','cities_user_id_foreign')
                ->references('id')
                ->on( 'users')
                ->onDelete('cascade');
            $table->foreign('car_id','cities_car_id_foreign')
                ->references('id')
                ->on( 'cars')
                ->onDelete('cascade');

            $table->json('tags');
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
        Schema::dropIfExists('cities');
    }
}
