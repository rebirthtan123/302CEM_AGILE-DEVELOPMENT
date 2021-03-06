<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_order', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('order_id')->references('id')->on('orders')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->references('id')->on('menus')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamp('created_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_order');
    }
}
