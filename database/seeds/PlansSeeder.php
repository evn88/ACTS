<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans =  [
            [
                'name' => 'Пароли и учетные записи',
                'img' => 'img/web.png',
            ],
            [
                'name' => 'Электронная почта',
                'img' => 'img/mail.png',
            ],
            [
                'name' => 'Веб-сайты',
                'img' => 'img/search.png',
            ],
            [
                'name' => 'Соц.сети и мессенджеры',
                'img' => 'img/sm.png',
            ],
            [
                'name' => 'Безопасность ПК',
                'img' => 'img/pc.png',
            ],
            [
                'name' => 'Безопасность мобильных устройств',
                'img' => 'img/key.png',
            ]
        ];


        foreach($plans as $val)
        {

            $plan = Plan::firstOrCreate(
                [
                    'name' => $val['name'],
                    'img' => $val['img'],
                ]
            );

            $plan->save();
        }

        if($plan->wasRecentlyCreated){
            $this->command->info('Базовые темы обучения созданы...');
        } else {
            $this->command->info('Базовые темы обучения уже существуют, продолжаем...');
        }
    }
}
