<?php

namespace Database\Seeders;

use App\Models\Admin;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([

            'name' => 'Admin',
            'email' => 'duzioristo@gmail.com',
            // 'email_verified_at' => now(),


            'phone' => '09090202853',
            'password' => bcrypt('mezu123'), //password
            'remember_token' => Str::random(10),


        ]);
    }
}
