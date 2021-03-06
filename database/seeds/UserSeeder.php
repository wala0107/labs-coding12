<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([

                'name' => 'Wala Smirani',
                'email' => 'wala.smirani@hotmail.com',
                'photo' =>'team/1.jpg',
                'password' => Hash::make('wala.smirani@hotmail.com'),
                'role_id' => 1,

            ]);
            
            DB::table('users')->insert([

                'name' => 'Elias Aboutaharan',
                'email' => 'elias@hotmail.com',
                'photo' =>'team/2.jpg',
                'password' => Hash::make('elias@hotmail.com'),
                'role_id' => 2,

            ]);
            
       
     
            DB::table('users')->insert([

                'name' => 'Fati Dahri ',
                'email' => 'fati@hotmail.com',
                'photo' =>'team/2.jpg',
                'password' => Hash::make('fati@hotmail.com'),
                'role_id' => 5,

            ]);
     
            DB::table('users')->insert([

                'name' => 'Jessica',
                'email' => 'jessica@hotmail.com',
                'photo' =>'team/2.jpg',
                'password' => Hash::make('jessica@hotmail.com'),
                'role_id' => 5,

            ]);
          
    }
}