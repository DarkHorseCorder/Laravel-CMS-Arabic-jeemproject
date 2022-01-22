<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus1 = [
            'title' => [
                "en" => "Articles",
                "ar" => "أصوات",
                "de" => "Artikel",
            ]
        ];
        $menus2 = [
            [
                'en' => [
                    'title' => 'Articles',
                ],
                'ar' => [
                    'title' => 'أصوات',
                ],
                'de' => [
                    'title' => 'Artikel',
                ],
            ],
            [
                'en' => [
                    'title' => 'Audios',
                ],
                'ar' => [
                    'title' => 'رسومات',
                ],
                'de' => [
                    'title' => 'Audios',
                ],
            ],
            [
                'en' => [
                    'title' => 'Illustrations',
                ],
                'ar' => [
                    'title' => 'صور',
                ],
                'de' => [
                    'title' => 'Illustrationen',
                ],
            ],
            [
                'en' => [
                    'title' => 'Images',
                ],
                'ar' => [
                    'title' => 'فيديوهات',
                ],
                'de' => [
                    'title' => 'Bilder',
                ],
            ],
            [
                'en' => [
                    'title' => 'Videos',
                ],
                'ar' => [
                    'title' => 'نصوص',
                ],
                'de' => [
                    'title' => 'Videos',
                ],
            ],
        ];

        $menus = [
            [
                "title" => [
                    'en' => 'Articles',
                    'ar' => 'أصوات',
                    'de' => 'Artikel'
                ]
            ],
            [
                "title" => [
                    'en' => 'Audios',
                    'ar' => 'رسومات',
                    'de' => 'Audios'
                ]
            ],
            [
                "title" => [
                    'en' => 'Illustrations',
                    'ar' => 'صور',
                    'de' => 'Illustrationen'
                ]
            ],
            [
                "title" => [
                    'en' => 'Images',
                    'ar' => 'فيديوهات',
                    'de' => 'Bilder'
                ]
            ],
            [
                "title" => [
                    'en' => 'Videos',
                    'ar' => 'نصوص',
                    'de' => 'Videos'
                ]
            ],
        ];

        foreach ($menus as $key => $menu) {
            Menu::create($menu);
        }
    }
}
