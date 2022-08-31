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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->char('b', 255);
            $table->char('c', 63);
            $table->char('d', 63);
            $table->char('e', 63);
            $table->char('f', 63);
            $table->char('g', 63);
            $table->char('h', 63);
            $table->char('i', 63);
            $table->char('j', 63);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
