<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_visit', function (Blueprint $table) {
            $table->bigInteger('visit_id')->unsigned()->nullable();
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->bigInteger('red_id')->unsigned()->nullable();
            $table->foreign('red_id')->references('id')->on('red_tests');
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
        Schema::dropIfExists('red_visit');
    }
};
