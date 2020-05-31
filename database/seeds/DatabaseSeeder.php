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
        App\User::create([
            'name' => 'RRHH',
            'email' => 'rrhh@admin.com',
            'password' => 123456
        ]);


        $this->call(StaffSeeder::class);
    }
}
