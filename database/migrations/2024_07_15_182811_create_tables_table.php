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
        Schema::create('tables', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->integer('guest_number')->default(0);
             $table->string('status')->default('available');
             $table->string('location');
             $table->enum('TableLocation',['front','inside','out']);
             $table->enum('TableStatus',['front','inside','out']);
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
        Schema::dropIfExists('tables');
    }
};