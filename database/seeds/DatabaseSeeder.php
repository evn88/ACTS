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
        $this->command->info('Таблица ролей успешно загружена!');
    }
}
