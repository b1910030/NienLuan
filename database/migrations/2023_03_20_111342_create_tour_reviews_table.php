<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_id');
            $table->bigInteger('user_id');
            $table->tinyInteger('rate')->default('0');
            $table->string('review');
            $table->enum('status', ['active','hidden']);
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
        Schema::dropIfExists('tour_reviews');
    }
}
