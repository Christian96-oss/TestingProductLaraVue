<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approve_list', function (Blueprint $table) {
            $table->id();
            $table->string('tp_id')->nullable();
            $table->string('route_lvl')->nullable();
	        $table->string('user_id')->nullable();
            $table->integer('route_flow')->nullable();
            $table->string('plant')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve_list');
    }
};
