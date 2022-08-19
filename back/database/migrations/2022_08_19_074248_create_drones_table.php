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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId("engine_slot_item_id")->nullable()->constrained('items')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("storage_slot_item_id")->nullable()->constrained('items')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("analyzer_slot_item_id")->nullable()->constrained('items')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("scanner_slot_item_id")->nullable()->constrained('items')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drones');
    }
};
