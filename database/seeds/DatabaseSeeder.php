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
        $this->call(AdminAccountSeeder::class);
        $this->call(DefaultServices::class);
        $this->call(DefaultPermitType::class);

        // $this->call(UsersTableSeeder::class);
    }
}
