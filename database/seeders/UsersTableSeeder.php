<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $visiteur = User::create([
            'name' => 'visiteur',
            'email' => 'visiteur@gmail.com',
            'password' => Hash::make('visiteur')
        ]);

        $utilisateur = User::create([
            'name' => 'utilisateur',
            'email' => 'utilisateur@gmail.com',
            'password' => Hash::make('utilisateur')
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $visiteurRole = Role::where('name', 'visiteur')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();

        $admin->roles()->attach($adminRole);
        $visiteur->roles()->attach($visiteurRole);
        $utilisateur->roles()->attach($utilisateurRole);
    }
}
