<?php

use Illuminate\Database\Seeder;
use App\Plan;
use App\Lesson;

class LessonsSeeder extends Seeder
{
    public function run()
    {
        $lessons = [
            [
                'name' => 'Урок 1',
                'lesson_text' => '<p>Первый урок!</p>'
            ],
            [
                'name' => 'Для чего нужно беспокоиться о безопасности паролей',
                'lesson_text' => '<h4>Почему мы не заботимся о безопасности своих паролей и какие ошибки допускаем?</h4><p>Каждый день мы множество раз пользуемся паролями, даже если не замечаем этого. Пароли защищают наши учетные записи на рабочих и личных компьютерах, наши социальные сети, электронную почту, самые важные папки и документы.<br><br>Чтобы завести новый аккаунт на любом интернет-ресурсе, нам приходится придумывать еще один пароль в дополнение к имеющимся и все их каким-то образом хранить или запоминать.</p><figure class="image"><img src="http://acts.local/storage/lessons_img/1/pass.png" alt=""></figure><blockquote><p><i>«Вероятно, Вы слышали о том, что пароль должен быть длиной не менее восьми символов и в нем должны присутствовать не только буквы, но и цифры.»</i></p></blockquote><p>Мы можем не заботиться о безопасности своих паролей, поскольку нам кажется, что мы не представляем интереса для мошенников. В результате <i><strong>мы храним пароли как попало:</strong></i> 28% пользователей записывают пароли в блокнот,<br>а 9% — на какой-нибудь листок рядом с компьютером.<br><br>Мы думаем, что преступников интересуют более масштабные цели — например, банковские серверы или аккаунты голливудских звезд, — но это далеко не всегда является правдой.<br><br>По этой же причине мы часто ленимся придумывать сложные пароли и используем простые и очень простые комбинации символов. Подобрать такие пароли очень легко. Однако, даже если мы хотим придумать сложный пароль, то не всегда знаем, каким он должен быть, чтобы легко запоминаться и надежно защищать наши данные.<br><br>Часто мы не понимаем, почему уже запомненный надежный пароль — например, от корпоративной почты — нельзя использовать в других местах, ведь его будет одинаково трудно взломать.<br><br><i><strong>К слову, о взломе:</strong></i> мы обычно не беспокоимся, когда кто-то пытается взломать наши учетные записи. Нам кажется, что неудачная попытка взлома не стоит внимания, если мошенники не достигли цели. Наконец, мы можем по неосторожности доверить свои пароли родственникам, коллегам, знакомым, даже если не знаем, известны ли им хотя бы основы информационной безопасности.</p><h4>Что самое интересное и важное мы будем изучать в теме «Пароли»?</h4><ul><li>Как определить, надежен пароль или нет</li><li>Как придумать сложный пароль</li><li>Где хранить пароль, чтобы он не потерялся или не был похищен</li><li>Что может случиться, если кому-то передать свой пароль</li><li>В каких случаях нужно сменить пароль</li><li>Почему нельзя использовать пароль от корпоративных учетных записей в других местах</li></ul>'
            ],
        ];

        $plan = Plan::whereName('Пароли и учетные записи')->first();


        foreach ($lessons as $item)
        {
            $lesson = Lesson::firstOrCreate([
                'plan_id' => $plan->id,
                'name' => $item['name'],
                'lesson_text' => $item['lesson_text'],
            ]);

//            $lesson->plans()->attach($plan->id);
            $lesson->save();

            if($lesson->wasRecentlyCreated){
                $this->command->info('Уроки загружены...');
            } else {
                $this->command->info('Уроки уже существуют, продолжаем...');
            }
        }
    }
}
