<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => [
                            'en' => 'Society',
                            'ar' => 'مجتمع',
                            'de' => 'Gesellschaft'
                        ],
                'color_code' => [
                            'en' => '#bf0072',
                            'ar' => '#bf0072',
                            'de' => '#bf0072'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Authority',
                            'ar' => 'سلطة',
                            'de' => 'Autorität'
                        ],
                'color_code' => [
                            'en' => '#bf0072',
                            'ar' => '#bf0072',
                            'de' => '#bf0072'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Culture',
                            'ar' => 'ثقافة',
                            'de' => 'Kultur'
                        ],
                'color_code' => [
                            'en' => '#f16541',
                            'ar' => '#f16541',
                            'de' => '#f16541'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Bodies',
                            'ar' => 'جسد',
                            'de' => 'Körper'
                        ],
                'color_code' => [
                            'en' => '#005888',
                            'ar' => '#005888',
                            'de' => '#005888'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Gender & Sexuality',
                            'ar' => 'جندر/ جنسانية',
                            'de' => 'Gender und Sexualität'
                        ],
                'color_code' => [
                            'en' => '#f16541',
                            'ar' => '#f16541',
                            'de' => '#f16541'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Internet',
                            'ar' => 'إنترنت',
                            'de' => 'Internet'
                        ],
                'color_code' => [
                            'en' => '#1b9a96',
                            'ar' => '#1b9a96',
                            'de' => '#1b9a96'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Love',
                            'ar' => 'حب',
                            'de' => 'Liebe'
                        ],
                'color_code' => [
                            'en' => '#392068',
                            'ar' => '#392068',
                            'de' => '#392068'
                        ],
            ],
            [
                'title' => [
                            'en' => 'Dossiers',
                            'ar' => 'الملفات',
                            'de' => 'Dossiers'
                        ],
                'color_code' => [
                            'en' => '#392068',
                            'ar' => '#392068',
                            'de' => '#392068'
                        ],
            ],
        ];

        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
