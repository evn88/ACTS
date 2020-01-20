# ACTS - Automatic Cybersecurity Training System
## Автоматическая система тренинга кибербезопасности

### Установка

1. Клонируйте репозиторий <code>git clone https://github.com/evn88/ACTS.git</code>
2. Скопируйте и переименуйте файл <b>.env.example</b>  в <b>.env</b>, далее укажите ваши настройки для БД и вашего почтового сервера, через который будут отправляться сообщения.
3. <code>composer install</code>
4. <code>npm install</code>
5. <code>php artisan key:generate</code>
6. <code>php artisan passport:keys</code>
7. <code>php artisan vendor:publish --tag=assets --force</code>
8. <code>php artisan migrate</code>
9. <code>php artisan db:seed</code>
10. Приложение использует очереди и Supervisor https://laravel.ru/docs/v5/queues
11. Установите Supervisor <code>sudo apt-get install supervisor</code>
12. Файлы настроек Supervisor обычно находятся в папке /etc/supervisor/conf.d. Там вы можете создать любое количество файлов с настройками, по которым Supervisor поймёт, как отслеживать ваши процессы. Для работы аукциона, создадим файл laravel-worker-auction.conf, который запускает и наблюдает за процессом queue:work:
<pre>
   [program:laravel-worker-auction]
    process_name=%(program_name)s_%(process_num)02d
    command=php /var/www/[ПУТЬ ДО ПРИЛОЖЕНИЯ]/technosale/artisan queue:work --sleep=3 --tries=3 --daemon
    autostart=true
    autorestart=true
    user=www-data
    numprocs=4
    redirect_stderr=true
    stdout_logfile=/var/www/[ПУТЬ ДО ПРИЛОЖЕНИЯ]/technosale/storage/logs/worker.log
</pre>
Подробнее о Supervisor читайте в его [документации](http://supervisord.org/index.html).

13. После создания файла настроек вы можете обновить конфигурацию Supervisor и запустить процесс при помощи следующих команд: <br>
    <code>sudo supervisorctl reread</code><br>
    <code>sudo supervisorctl update</code><br>
    <code>sudo supervisorctl start laravel-worker:*</code>



## Copyright and License

ACTS was written by Vershkovs A & E for the Laravel framework and is released under the MIT License.
See the LICENSE file for details.
