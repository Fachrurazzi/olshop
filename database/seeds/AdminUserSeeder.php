<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Olshop',
            'email' => 'admin@olshop.com',
            'password' => bcrypt(12345678),
            'address' => 'Banjarmasin',
            'phone' => '089627306954'
        ]);

        $admin->assignRole('admin');
    }
}
