<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edges', function (Blueprint $table) {
            $table->id();           

            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');

            $table->timestamps();
            
            // relationships
            $table->foreign('parent_id')->references('id')->on('nodes');
            $table->foreign('child_id')->references('id')->on('nodes'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edges');
    }
}
