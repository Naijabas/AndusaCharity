<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomingevents', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->longtext('post');
            $table->binary('passport');
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
        Schema::dropIfExists('upcomingevents');
    }
}
