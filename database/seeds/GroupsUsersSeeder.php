<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;

class GroupsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Group::where('name','Базовая')->firstOrFail();
        $user = User::where('name', 'Администратор')->firstOrFail();
        if($user->count() > 0 & $user->groups->count() == 0){
            $user->groups()->attach($group->id);
            $this->command->info('Добавили базовую группу админу...');
        } else {
            $this->command->info('Администратор уже состоит в группе/группах...');
        }
    }
}
