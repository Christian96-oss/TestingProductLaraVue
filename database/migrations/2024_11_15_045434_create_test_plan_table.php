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
        Schema::create('test_plan', function (Blueprint $table) {
            $table->id();
            $table->string('tp_id')->nullable();
            $table->string('requestor')->nullable();
	        $table->string('family');
            $table->string('reference');
            $table->string('lob');
	        $table->string('test_name');
            $table->string('qty');
            $table->string('detail')->nullable();
            $table->date('plan_date')->nullable();
	        $table->string('status')->nullable();
            $table->date('est_date')->nullable();
            $table->integer('duration_day')->nullable();
            $table->string('urgency')->nullable();
            $table->string('test_result')->nullable();
	        $table->string('file_name')->nullable();
            $table->date('reschedule_plan_date')->nullable();
            $table->date('actual_plan_date')->nullable();
            $table->integer('actual_duration_day')->nullable();
            $table->date('actual_est_date')->nullable();
            $table->string('plant')->nullable();
            $table->string('purpose')->nullable();
	        $table->string('reason')->nullable();
            $table->string('asc_doc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_plan');
    }
};
