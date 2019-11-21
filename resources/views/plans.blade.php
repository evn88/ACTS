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
                <img src="http://acts.local/storage/img/web.png" alt="">
                <p class="text">Пароли<br>и учетные записи</p>
            </div>
            <div class="cell">
                <img src="http://acts.local/storage/img/mail.png" alt="">
                <p class="text">Электронная<br>почта</p>
            </div>
            <div class="cell">
                <img src="http://acts.local/storage/img/search.png" alt="">
                <p class="text">Веб-сайты</p>
            </div>
        </div>
        <div class="row_1">
            <div class="cell">
                <img src="http://acts.local/storage/img/sm.png" alt="">
                <p class="text">Соц.сети<br>и мессенджеры</p>
            </div>
            <div class="cell">
                <img src="http://acts.local/storage/img/pc.png" alt="">
                <p class="text">Безопасность<br>ПК</p>
            </div>
            <div class="cell">
                <img src="http://acts.local/storage/img/key.png" alt="">
                <p class="text">Безопасность<br>мобильных устройств</p>
            </div>
        </div>
    </div>
</div>
<h3>Информация об успеваемости</h3>




<div class="row_1" style="width: 650px; align-items: baseline;">
    <p style="font-size: 18px;">Сформировать отчет в формате xls и скачать его</p>
    <a href="#" class="btn btn-primary">Скачать отчет</a>
</div>



@endsection