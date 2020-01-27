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
                'img' => 'storage/img/web.png',
            ],
            [
                'name' => 'Электронная почта',
                'img' => 'storage/img/mail.png',
            ],
            [
                'name' => 'Веб-сайты',
                'img' => 'storage/img/search.png',
            ],
            [
                'name' => 'Соц.сети и мессенджеры',
                'img' => 'storage/img/sm.png',
            ],
            [
                'name' => 'Безопасность ПК',
                'img' => 'storage/img/pc.png',
            ],
            [
                'name' => 'Безопасность мобильных устройств',
                'img' => 'storage/img/key.png',
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
