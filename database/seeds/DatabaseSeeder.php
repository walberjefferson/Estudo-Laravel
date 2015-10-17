<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        factory('App\User')->create([
            'name' => 'Walber',
            'email' => 'walberjefferson@hotmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        $this->call(PostTableSeeder::class);
        $this->call(TagTableSeeder::class);

        Model::reguard();
    }
}
