<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Color::insert([
            [
                'name' => 'pink-1',
                'code' => '#bf0072',
            ],
            [
                'name' => 'pink-2',
                'code' => '#a72d6f',
            ],
            [
                'name' => 'orange',
                'code' => '#f16541',
            ],
            [
                'name' => 'blue',
                'code' => '#005888',
            ],
            [
                'name' => 'blue-light',
                'code' => '#1b9a96',
            ],
        ]);

    }
}
