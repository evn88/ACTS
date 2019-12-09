@extends('layouts.public')
@section('content')

<h1><i class="fa fa-book" aria-hidden="true"></i> Учебный план</h1>
<p class="heading">В данном разделе вы можете ознакомиться со всеми темами для изучения, входящими в учебный план,
            а также с их подробным содержанием.
</p>
<h3>Темы для изучения</h3>

<div class="row_1">
    <div class="card_plan">
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/web.png" alt="">
                    <p class="text">Пароли<br>и учетные записи</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/mail.png" alt="">
                    <p class="text">Электронная<br>почта</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/search.png" alt="">
                    <p class="text">Веб-сайты</p>
                </a>
            </div>
        </div>
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/sm.png" alt="">
                    <p class="text">Соц.сети<br>и мессенджеры</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/pc.png" alt="">
                    <p class="text">Безопасность<br>ПК</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('plansinf') }}">
                    <img src="http://acts.local/storage/img/key.png" alt="">
                    <p class="text">Безопасность<br>мобильных устройств</p>
                </a>
            </div>
        </div>
    </div>
</div>




@endsection