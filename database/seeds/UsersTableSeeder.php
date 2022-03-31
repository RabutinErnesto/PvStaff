<?php

use App\Role;
use App\User;
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
      User :: truncate();
      DB:: table('role_user')->truncate();


     $admin = User::create([
          'name'=>'Ernesto',
          'pseudo'=>'Rbt',
          'email'=>'rabutinernesto0201@gmail.com',
          'password'=>Hash::make('password')

      ]);

     $auteur = User::create([
        'name'=>'auteur',
        'pseudo'=>'auteur',
        'email'=>'auteur@gmail.com',
        'password'=>Hash::make('password')

    ]);

    $utilisateur = User::create([
        'name'=>'utilisateur',
        'pseudo'=>'user',
        'email'=>'utilisateur@gmail.com',
        'password'=>Hash::make('password')

    ]);

            $adminRole =  Role::where('name', 'admin')->first();
            $auteurRole = Role::where('name', 'auteur')->first();
            $utilisateurRole = Role::where('name', 'utilisateur')->first();

            $admin->roles()->attach($adminRole);
            $auteur->roles()->attach($auteurRole);
            $utilisateur->roles()->attach($utilisateurRole);
    }
}
