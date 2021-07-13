<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@operator.com',
            'email_verified_at' => now(),
            'password' => bcrypt('operator')
        ]);

        $operator->assignRole('operator');
    }
}
