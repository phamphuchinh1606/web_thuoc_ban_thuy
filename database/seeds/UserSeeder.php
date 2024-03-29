<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TableNameDB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(TableNameDB::$TableUser)->insert([
            'name' => 'phuchinh',
            'email' => 'phuchinh@gmail.com',
            'user_type_id' => 1,
            'password' => Hash::make('phuchinh'),
        ]);
    }
}

