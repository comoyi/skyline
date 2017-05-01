<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        MenusTableSeeder::class,
        AdminUsersTableSeeder::class,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }
    }
}
