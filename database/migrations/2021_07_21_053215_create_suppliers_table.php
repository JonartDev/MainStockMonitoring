<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('supplier_code')->nullable();
            $table->string('supplier_name');
            $table->string('TIN')->nullable();
            $table->string('add')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->unique();
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
        Schema::dropIfExists('suppliers');
    }
}
