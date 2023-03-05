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
        Schema::create('returnhistories', function (Blueprint $table) {
            $table->id();
            $table->integer('returntransaction_id');
            $table->string('rhproduct');
            $table->integer('rhquantity');
            $table->string('rhprice');
            $table->string('rhtotal');
            $table->string('rstatus')->default('Return');
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
        Schema::dropIfExists('returnhistories');
    }
};
