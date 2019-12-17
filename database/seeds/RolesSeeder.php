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
        $author = Role::create([
            'name' => 'Администратор',
            'slug' => 'admin'
        ]);
        $editor = Role::create([
            'name' => 'Студент',
            'slug' => 'student'
        ]);
    }
}
