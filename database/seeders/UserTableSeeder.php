<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'admin',
            'password' => 'admin',
            'extension' => '100',
            'api_key' => 'api_key',
            'on_hook' => 'y',
            'user_group_id' => '3',
            'is_active' => 'y',
            'created_by' => '-1',
            'created_date' => '2022-07-23 18:47:00',
            'status' => 'logged_out',
        ]);
    }
}
