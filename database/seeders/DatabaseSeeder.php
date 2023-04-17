<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'username' => 'admin',
      'firstname' => 'Admin',
      'lastname' => 'Admin',
      'email' => 'admin@argon.com',
      'user_type' => 'admin',
      'password' => bcrypt('secret')
    ]);

    DB::table('users')->insert([
      'username' => 'teacher',
      'firstname' => 'Teacher',
      'lastname' => 'Teacher',
      'email' => 'tea@cher.com',
      'user_type' => 'teacher',
      'password' => bcrypt('secret')
    ]);

    DB::table('users')->insert([
      'username' => 'candidat',
      'firstname' => 'Candidat',
      'lastname' => 'Candidat',
      'email' => 'candi@dat.com',
      'user_type' => 'candidat',
      'password' => bcrypt('secret')
    ]);
  }
}
