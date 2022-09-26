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
        Schema::create('buildings_map', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('building_id')->constrained()->onDelete('cascade');
            $table->foreignId('plot_id')->constrained()->onDelete('cascade');
            $table->integer('level')->default(0);
            $table->integer('volume')->nullable();
            $table->integer('storage')->nullable();
            $table->integer('speed')->nullable();
            $table->string('name');
            $table->string('type');
            $table->integer('parent_id')->nullable();
            $table->integer('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings_map');
    }
};
