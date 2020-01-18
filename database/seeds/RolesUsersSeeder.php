<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::where('slug', 'admin')->firstOrFail();
        $user = User::find(1);
        if(!$user){
            $user = User::create(
                [
                    'id' => 1,
                    'name' => 'Администратор',
                    'email' => 'admin@example.ru',
                    'password'=>Hash::make('admin12345678'),
                ]);
                $this->command->info('Создан пользователь admin с id=1...');
                $this->command->info('
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Для входа использутей следующие данные:
            email: admin@example.ru
            password: admin12345678
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                ');

        }

        if($user->count() > 0 & $user->roles->count() == 0){
            $user->roles()->attach($role->id);
            $this->command->info('Добавили роль админа пользователю с id=1...');
        } else {
            $this->command->info('Роль пользователя с id=1 уже имеет связи, нужно проверить вручную');
        };
    }
}
