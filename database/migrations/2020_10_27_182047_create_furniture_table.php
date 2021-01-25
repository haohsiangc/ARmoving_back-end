<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture', function (Blueprint $table) {
            $table->increments('fid')->unsigned();
            $table->bigInteger('rooms_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->string('fName')->nullable();
            $table->float('fvol')->nullable();
            $table->integer('famount')->nullable();
            $table->integer('fprice')->nullable();
            $table->string('pic_loc')->nullable();
            $table->timestamps();

            $table->foreign('rooms_id')->references('rid')
            ->on('rooms')->onDelete('cascade');
            $table->foreign('users_id')->references('id')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('furniture');
    }
}
