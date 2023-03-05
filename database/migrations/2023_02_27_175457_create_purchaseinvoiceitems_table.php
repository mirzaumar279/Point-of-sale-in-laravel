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
        Schema::create('purchaseinvoiceitems', function (Blueprint $table) {
            $table->id();
            $table->Integer('item_id');
            $table->String('itemname');
            $table->String('tquantity');
            $table->String('rquantiy');
            $table->String('costunit');
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
        Schema::dropIfExists('purchaseinvoiceitems');
    }
};
