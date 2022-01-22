<?php

use App\Avatar;
use Illuminate\Database\Seeder;

class AvatarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::insert([
            [
                "name" => "avatar1",
                "image_path" => "avatars/avatar1.png",
            ],
            [
                "name" => "avatar2",
                "image_path" => "avatars/avatar2.png",
            ],
            [
                "name" => "avatar3",
                "image_path" => "avatars/avatar3.png",
            ],
            [
                "name" => "avatar4",
                "image_path" => "avatars/avatar4.png",
            ],
            [
                "name" => "avatar5",
                "image_path" => "avatars/avatar5.png",
            ],
            [
                "name" => "avatar6",
                "image_path" => "avatars/avatar6.png",
            ],
        ]);
    }
}
