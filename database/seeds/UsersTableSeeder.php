<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Camilo Perez',
          'email' => 'camilo@gmail.com',
          'password'=> bcrypt('camilo')
        ]);
        User::create([
          'name' => 'Rodrigo Hernandez',
          'email' => 'rodrigo@gmail.com',
          'password'=> bcrypt('rodrigo')
        ]);
        User::create([
          'name' => 'Andres Lopez',
          'email' => 'andres@gmail.com',
          'password'=> bcrypt('andres')
        ]);
    }
}
