<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
			[
				'role_id'     => 1,
        'name'        => 'Kapitan Pulido',
        'email'       => 'kapitanpulido@gmail.com',
        'password'    => bcrypt('password'),
        'created_at'  => now()
			],
    ]);
  }
}
