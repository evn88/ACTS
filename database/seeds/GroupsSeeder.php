<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsSeeder extends Seeder
{
    public function run()
    {
        $group = Group::firstOrCreate([
            'name' => 'Базовая',
            'date_start' => null,
            'date_end' => null,
            'status' => 'stopped',
        ]);

        if($group->wasRecentlyCreated){
            $this->command->info('Базовая группа создана...');
        } else {
            $this->command->info('Базовая группа уже существует, продолжаем...');
        }

    }
}
