<?php

namespace Database\Seeders;

use App\Models\Access;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederAccess extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Schema::disableForeignKeyConstraints();
        Access::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            'admin', 'user'
        ];
        foreach ($data as $value) {
            Access::insert([
                'access' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } */
    }
}
