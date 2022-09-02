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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->float('dollars_count')->nullable();
            $table->float('terra_count')->nullable();
            $table->float('air_count')->nullable();
            $table->float('hydro_count')->nullable();
            $table->float('critical_step_chance')->nullable();
            $table->float('critical_step_force')->nullable();
            $table->float('dollars_per_step')->nullable();
            $table->integer('max_dollars')->nullable();
            $table->integer('energy')->nullable();
            $table->integer('crystals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
