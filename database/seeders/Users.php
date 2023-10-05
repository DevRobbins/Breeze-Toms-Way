<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use App\Models\User; 

// class User extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $users = [
//             [
//                 'name' => env('ADMIN_01_NAME'),
//                 'email' => env('ADMIN_01_EMAIL'),
//                 'role' => env('ADMIN_01_ROLE'),
//                 'password' => env('ADMIN_01_PASSWORD'),
//             ],
//             [
//                 'name' => env('ADMIN_02_NAME'),
//                 'email' => env('ADMIN_02_EMAIL'),
//                 'role' => env('ADMIN_02_ROLE'),
//                 'password' => env('ADMIN_02_PASSWORD')
//             ]           
//         ];

//         foreach ($users as $user) {
//             User::create([
//                 'name' => $user['name'],
//                 'email' => $user['email'],
//                 'role' => $user['role'],
//                 'password' => Hash::make($user['password']),
//             ]);

//         }
//     }
// }
