<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            AuthorTableSeeder::class,
            CategoryTableSeeder::class,
            MenusTableSeeder::class,
            TagsTableSeeder::class,
            AvatarTableSeeder::class,
            ColorTableSeeder::class,
            PagesTableSeeder::class,
            PageSectionTableSeeder::class,
            WebSettingTableSeeder::class,
        ]);
    }
}
