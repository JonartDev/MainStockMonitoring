<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('category_id')->nullable()->charset('utf8mb4');
            $table->string('item')->charset('utf8mb4');
            $table->string('UOM')->nullable()->charset('utf8mb4');
            $table->string('n_a')->nullable()->charset('utf8mb4');
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
        Schema::dropIfExists('items');
    }
}
