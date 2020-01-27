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
        $this->call(RolesSeeder::class);
        $this->call(RolesUsersSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(GroupsUsersSeeder::class);
        $this->call(PlansSeeder::class);
        $this->command->info('Таблицы успешно заполнены!');
    }
}
