<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  $user =  App\user::create([

        'name' => 'Kidus Admin',
        'email' => 'kidus@admin.com',
        'password'=> bcrypt('password'),
        'admin' => 1

    ]);

    App\Profile::create([

        'user_id' => $user->id,
        'avatar' => 'uploads/avatars/1566463768IMG_0841.JPG',
        'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis laudantium ea tempore nulla quaerat possimus soluta? Consequuntur, corporis delectus repudiandae hic perspiciatis dolore blanditiis voluptas, magni et quaerat accusamus omnis?
        ',
        'facebook' => 'facebook.com',
        'youtube' => 'youtube.com'

    ]);


    }
}
