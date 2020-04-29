<?php

use Illuminate\Database\Seeder;
use App\{User, Profile, Image};

class UserSeeder extends Seeder
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
            'surname' => '',
            'email' => 'admin@blogadmin.com',
            'password' => bcrypt('admin'),
            'role_id' => 2,
				]);
        $image = Image::create([
            'ruta' => 'default.jpg',
        ]);
  			Profile::create([
  				  'user_id' => $admin->id,
            'image_id' => $image->id
  			]);


    }
}
