<?php

use App\PageSection;
use Illuminate\Database\Seeder;

class PageSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageSection::insert([
            [
                'name' => 'sec_a',
            ],
            [
                'name' => 'sec_b',
            ],
            [
                'name' => 'sec_c',
            ],
            [
                'name' => 'sec_d',
            ],
        ]);
    }
}
