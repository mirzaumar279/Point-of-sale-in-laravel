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
        Schema::create('returntransactions', function (Blueprint $table) {
            $table->id();
            $table->string('rtamount');
            $table->integer('rtpaid');
            $table->string('rtbalance');
            $table->date('rdate');
            $table->string('rmethod');
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
        Schema::dropIfExists('returntransactions');
    }
};
