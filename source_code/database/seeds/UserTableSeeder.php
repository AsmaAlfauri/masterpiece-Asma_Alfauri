<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'Asma';
        $admin->email = 'asma@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->isAdmin = '1';
        $admin->save();
    }
}
