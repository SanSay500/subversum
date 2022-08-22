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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->enum('slot',['engine', 'scanner', 'analyzer', 'storage']);
            $table->boolean('is_nft');
            $table->integer('rarity');
            $table->string('image');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->integer('primary_max_dollars')->nullable();
            $table->float('primary_critical_step_chance')->nullable();
            $table->float('primary_critical_step_force')->nullable();
            $table->float('primary_dollars_per_step')->nullable();
            $table->integer('secondary_max_dollars')->nullable();
            $table->float('secondary_critical_step_chance')->nullable();
            $table->float('secondary_critical_step_force')->nullable();
            $table->float('secondary_dollars_per_step')->nullable();
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
};
