<?php

use App\Author;
use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                "title" => [
                    'en' => 'Miriam Ben Ghazi',
                    'ar' => 'مريم بن غازي',
                    'de' => 'Miriam Ben Ghazi',
                ],
                "info" => [
                    'en' => 'Miriam Ben Ghazi writes about her life experiences, in an attempt to find that fine balance between staying true to her Arab heritage and becoming the woman she wants to be.',
                    'ar' => 'تكتب مريم بن غازي عن تجاربها الحياتية في محاولةٍ لإيجاد نوعٍ من التوازن بين إخلاصها للإرث العربي ورغبتها بأن تكون المرأة التي تريد.',
                    'de' => 'Miriam Ben Ghazi writes about her life experiences, in an attempt to find that fine balance between staying true to her Arab heritage and becoming the woman she wants to be.',
                ],
            ],
            [
                "title" => [
                    'en' => 'Ben Ghazi',
                    'ar' => 'مريم بن ',
                    'de' => 'Ben Ghazi',
                ],
                "info" => [
                    'en' => 'Miriam Ben Ghazi writes about her life experiences, in an attempt to find that fine balance between staying true to her Arab heritage and becoming the woman she wants to be.',
                    'ar' => 'تكتب مريم بن غازي عن تجاربها الحياتية في محاولةٍ لإيجاد نوعٍ من التوازن بين إخلاصها للإرث العربي ورغبتها بأن تكون المرأة التي تريد.',
                    'de' => 'Miriam Ben Ghazi writes about her life experiences, in an attempt to find that fine balance between staying true to her Arab heritage and becoming the woman she wants to be.',
                ],
            ],
        ];

        foreach ($authors as  $author) {
            Author::create($author);
        }
    }
}
