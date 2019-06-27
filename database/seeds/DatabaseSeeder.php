<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
//            OrderStatusSeeder::class,
//            SettingSeeder::class,
//            ProductTypeSeeder::class,
//            SettingTagSeeder::class,
            UserSeeder::class
        ]);
    }
}
