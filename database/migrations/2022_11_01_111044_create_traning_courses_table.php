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
        Schema::create('traning_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->longText('describes')->nullable();
            $table->integer('price')->default(0);
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->longText('schedule')->nullable();
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
        Schema::dropIfExists('traning_courses');
    }
};
