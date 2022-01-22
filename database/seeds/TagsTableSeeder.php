<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags2 = [
            [
                'en' => [
                    'title' => 'Patriarchy',
                ],
                'ar' => [
                    'title' => 'أبوية',
                ],
                'de' => [
                    'title' => 'Patriarchy',
                ],
            ],
            [
                'en' => [
                    'title' => 'Blackmail',
                ],
                'ar' => [
                    'title' => 'ابتزاز',
                ],
                'de' => [
                    'title' => 'Blackmail',
                ],
            ],
            [
                'en' => [
                    'title' => 'Dating',
                ],
                'ar' => [
                    'title' => 'مواعدة',
                ],
                'de' => [
                    'title' => 'Dating',
                ],
            ],
            [
                'en' => [
                    'title' => 'Relationships',
                ],
                'ar' => [
                    'title' => 'علاقات',
                ],
                'de' => [
                    'title' => 'Beziehungen',
                ],
            ],
            [
                'en' => [
                    'title' => 'Religions',
                ],
                'ar' => [
                    'title' => 'أديان',
                ],
                'de' => [
                    'title' => 'Religions',
                ],
            ],
            [
                'en' => [
                    'title' => 'Islam',
                ],
                'ar' => [
                    'title' => 'إسلام',
                ],
                'de' => [
                    'title' => 'Islam',
                ],
            ],
            [
                'en' => [
                    'title' => 'Menstrual Cycle',
                ],
                'ar' => [
                    'title' => 'الدورة الشهرية',
                ],
                'de' => [
                    'title' => 'Menstrual Cycle',
                ],
            ],
            [
                'en' => [
                    'title' => 'Ramadan',
                ],
                'ar' => [
                    'title' => 'رمضان',
                ],
                'de' => [
                    'title' => 'Ramadan',
                ],
            ],
            [
                'en' => [
                    'title' => 'Traditions',
                ],
                'ar' => [
                    'title' => 'تقاليد',
                ],
                'de' => [
                    'title' => 'Traditions',
                ],
            ],

        ];

        $tags = [
            [
                "title" => [
                    'en' => 'Patriarchy',
                    'ar' => 'أبوية',
                    'de' => 'Patriarchy'
                ]
            ],
            [
                "title" => [
                    'en' => 'Blackmail',
                    'ar' => 'ابتزاز',
                    'de' => 'Blackmail'
                ]
            ],
            [
                "title" => [
                    'en' => 'Dating',
                    'ar' => 'مواعدة',
                    'de' => 'Dating'
                ]
            ],
            [
                "title" => [
                    'en' => 'Relationships',
                    'ar' => 'علاقات',
                    'de' => 'Beziehungen'
                ]
            ],
            [
                "title" => [
                    'en' => 'Religions',
                    'ar' => 'أديان',
                    'de' => 'Religions'
                ]
            ],
            [
                "title" => [
                    'en' => 'Islam',
                    'ar' => 'إسلام',
                    'de' => 'Islam'
                ]
            ],
            [
                "title" => [
                    'en' => 'Menstrual Cycle',
                    'ar' => 'الدورة الشهرية',
                    'de' => 'Menstrual Cycle'
                ]
            ],
            [
                "title" => [
                    'en' => 'Ramadan',
                    'ar' => 'رمضان',
                    'de' => 'Ramadan'
                ]
            ],
            [
                "title" => [
                    'en' => 'Traditions',
                    'ar' => 'تقاليد',
                    'de' => 'Traditions'
                ]
            ],
        ];
        
        foreach ($tags as $key => $tag) {
            Tag::create($tag);
        }
    }
}
