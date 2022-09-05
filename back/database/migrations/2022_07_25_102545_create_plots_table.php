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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string('name');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->float('longitude');
            $table->integer('water_count');
            $table->integer('terra_count');
            $table->integer('hydro_count');
            $table->float('latitude');
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plots');
    }
};
