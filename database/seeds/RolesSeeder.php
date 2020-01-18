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
        $admin = Role::firstOrCreate([
            'name' => 'Администратор',
            'slug' => 'admin'
        ]);
        if($admin->wasRecentlyCreated){
            $this->command->info('Роль администратора создана...');
        } else {
            $this->command->info('Роль администратора уже существует, продолжаем...');
        }

        $student = Role::firstOrCreate([
            'name' => 'Студент',
            'slug' => 'student'
        ]);
        if($student->wasRecentlyCreated){
            $this->command->info('Роль студента создана...');
        } else {
            $this->command->info('Роль студента уже существует, продолжаем...');
        }
    }
}
