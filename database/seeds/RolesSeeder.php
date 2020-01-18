<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::firstOrCreate([
            'name' => 'Администратор',
            'slug' => 'admin'
        ]);
        if($author->wasRecentlyCreated){
            $this->command->info('Роль администратора создана...');
        } else {
            $this->command->info('Роль администратора уже существует, продолжаем...');
        }

        $editor = Role::firstOrCreate([
            'name' => 'Студент',
            'slug' => 'student'
        ]);
        if($author->wasRecentlyCreated){
            $this->command->info('Роль студента создана...');
        } else {
            $this->command->info('Роль студента уже существует, продолжаем...');
        }
    }
}
