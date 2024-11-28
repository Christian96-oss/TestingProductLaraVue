<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        User::insert([
            [
                'user_id' => 'SESA732253',
		'name' => 'Christian',
		'password' => Hash::make('123'),
		'access' => 1,
		'plant' => '1',
                'email' => 'chris@gmail.com',
		'apps' => 'NSS',
                'dept' => 'LAB',
		'qa' => 'INC'
            ],
            [
                'user_id' => 'SESA111',
		'name' => 'Fernando',
		'password' => Hash::make('123'),
		'access' => 1,
		'plant' => '1',
                'email' => 'fer@gmail.com',
		'apps' => 'STM',
                'dept' => 'TA',
		'qa' => 'ETS'
        ],
        [
             	'user_id' => 'SESA2222',
		'name' => 'Siagian',
		'password' => Hash::make('123'),
		'access' => 1,
		'plant' => '1',
                'email' => 'agian@gmail.com',
		'apps' => 'NSS',
                'dept' => 'LAB',
		'qa' => 'INP'
        ],
        [
            	'user_id' => 'SESA3333',
		'name' => 'Requestor',
		'password' => Hash::make('123'),
		'access' => 2,
		'plant' => '1',
                'email' => 'req@gmail.com',
		'apps' => 'NSS',
                'dept' => 'LAB',
		'qa' => 'INC'
        ],
    ]); */
    }
}
