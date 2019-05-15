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
        DB::table('users')->insert([
            'name' => 'Osvaldo Escobar',
            'email' => 'eoeg1410@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Sue Lee',
            'email' => 'COE@GeorgeTownENGLISH.com',
            'password' => bcrypt('admin123'),
            'is_admin'=> '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Becky Torres',
            'email' => 'torres.rebeca.014@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin'=> '0',
        ]);
    }
}
