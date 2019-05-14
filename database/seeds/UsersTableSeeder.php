<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrNew(['name' => 'admin']);

        if (!$admin->exists) {
            $admin->fill([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(60)
            ]);
            $admin->save();
        }
    }
}
