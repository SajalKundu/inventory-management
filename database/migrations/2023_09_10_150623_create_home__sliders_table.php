<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home__sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('rank')->nullable();
            $table->string('title')->nullable();
            $table->string('morelink')->nullable();
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->string('mobile_images')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('hstatus')->default(1);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('home__sliders');
    }
}
