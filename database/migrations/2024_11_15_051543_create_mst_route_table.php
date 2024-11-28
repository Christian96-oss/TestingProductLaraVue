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
        Schema::create('mst_route', function (Blueprint $table) {
            $table->integer('route_flow')->nullable();
            $table->string('route_lvl')->nullable();
            $table->string('desc')->nullable();
            $table->string('plant')->nullable();
            $table->string('route_modify')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_route');
    }
};
