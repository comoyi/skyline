<?php

use App\Models\Admin\AdminUser;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUser();
        $user->username = 'michael';
        $user->password = '$2y$10$V9u8sKCiuIgFFajtXh3Eee/XVtkG2yHqjpSHlTJ5B/j.fzpRR0XOm';
        $user->name = 'Michael Chi';
        $user->group_id = 0;
        $user->email = '';
        $user->mobile = '';
        $user->phone = '';
        $user->sex = 1;
        $user->save();
    }
}
