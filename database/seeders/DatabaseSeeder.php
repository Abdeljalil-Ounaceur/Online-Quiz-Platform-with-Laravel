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
      'isTeacher' => 0,
      'password' => bcrypt('secret')
    ]);
  }
}
