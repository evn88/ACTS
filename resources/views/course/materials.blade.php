@extends('layouts.course')
@section('content')

<h1><i class="fa fa-home" aria-hidden="true"></i> Материалы для изучения</h1>
<p class="heading">В данном разделе собраны все темы, которые вам необходимо пройти. Следующая тема будет доступна после прохождения предыдущей<br>
    и удачной сдаче теста по ней. Если вы хорошо знаете тему, пройдите по ней тест в подтверждение своих знаний,<br>
    пропустите теоретическую часть и переходите к следующим учебным материалам.
</p>

<div class="row_1">
    <div class="card_plan">
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/web.png" alt="">
                    <p class="text">Пароли<br>и учетные записи</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/mail.png" alt="">
                    <p class="text">Электронная<br>почта</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/search.png" alt="">
                    <p class="text">Веб-сайты</p>
                </a>
            </div>
        </div>
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/sm.png" alt="">
                    <p class="text">Соц.сети<br>и мессенджеры</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/pc.png" alt="">
                    <p class="text">Безопасность<br>ПК</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="http://acts.local/storage/img/key.png" alt="">
                    <p class="text">Безопасность<br>мобильных устройств</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection