<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTestPlanTable extends Migration
{
    public function up()
    {
        Schema::table('test_plan', function (Blueprint $table) {
            $table->string('status')->default('Waiting Approve Lab Engineer'); // Menambahkan kolom status dengan nilai default
        });
    }

    public function down()
    {
        Schema::table('test_plan', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status jika rollback
        });
    }
}
