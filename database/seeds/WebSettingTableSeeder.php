<?php

use App\WebSetting;
use Illuminate\Database\Seeder;

class WebSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebSetting::insert([
            [
                'name'              => 'Jeem Clone',
                'email'             => 'info@jeem.me',
                'contact_show'      => '+971 12 123 1234',
                'contact'           => '+971121231234',
                'address'           => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'facebook_link'     =>  null,
                'instagram_link'    =>  null,
                'twitter_link'      =>  null,
                'linkedin_link'     =>  null,
                'whatsapp_link'     =>  null,
            ]
        ]);
    }
}
