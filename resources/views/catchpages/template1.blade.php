@extends('layouts.course')
@section('content')

<h1 class="catchpage">Вы попались на фишинговое письмо!</h1>
<div class="block">
    <img src="{{ asset('storage/img/fishing.png') }}" alt="">
</div>
<div class="jumbotron">
    <p class="test">
        Вам повезло. Это письмо — просто проверка знаний по итогам пройденной темы.
        Однако если бы оно было настоящим, злоумышленники могли бы:
    </p>
    <hr class="my-4">
    <ul type="square" class="lesson catch">
        <li><span>Получить доступ к вашим счетам</span></li>
        <li><span>Похитить ваши личные данные</span></li>
        <li><span>Получить доступ к конфиденциальной информации</span></li>
        <li><span>Установить на ваш компьютер вредоносное ПО</span></li>
    </ul>
</div>
<p class="lesson">В учебном модуле <em> «Пароли и учетные записи» </em> мы говорили о том, что нельзя никому сообщать свой пароль.
    В том числе нельзя отправлять его письмом, вводить в форму, полученную в письме, а также вводить пароль
    на сайте, ссылка на который пришла в электронном письме. <br><br>
    Пароль от Google-аккаунта служит для входа во все сервисы Google — и в электронную почту, и на Google Диск,
    и так далее. Украв пароль, мошенники смогут действовать от вашего лица — например, рассылать сообщения вашим
    коллегам и контрагентам, чтобы получить доступ к их аккаунтам, деньгам или важной информации.
</p>
<div class="row py-3"></div>
<div class="jumbotron catching">
    <h4>Что должно было вас насторожить?</h4>
    <hr class="my-4">
    <ul type="square" class="lesson catch">
        <li><span>Кнопка и ссылка с просьбой ввести пароль в письме</span></li>
        <li><span>Неправдоподобное обоснование того, почему вам нужно это сделать</span></li>
    </ul>
</div>
<div class="block catch">
    <div class="row py-3"></div>
    <h4>Это нужно запомнить!</h4>
    <p class="test">Если злоумышленники получат доступ к вашим личным данным или конфиденциальной информации,
        это может привести к:
    </p>
</div>
<div class="row_1 catch">
    <div class="item">
        <img src="{{ asset('storage/img/money.png') }}" alt="">
        <p>Финансовым потерям</p>
    </div>
    <div class="item">
        <img src="{{ asset('storage/img/fraud.png') }}" alt="">
        <p>Подрыву репутации</p>
    </div>
    <div class="item">
        <img src="{{ asset('storage/img/doc.png') }}" alt="">
       <p>Хищению важной информации</p>
    </div>
</div>
<div class="row py-5"></div>
<div class="jumbotron">
    <p class="test">
        Что нужно делать, если вы получили фишинговое письмо?
    </p>
    <hr class="my-4">
    <ul type="square" class="lesson catch">
        <li><span>Не нажимать на активные элементы внутри письма и не сохранять файлы из него</span></li>
        <li><span>Сообщить о получении письма в отдел безопасности вашей компании</span></li>
        <li><span>Удалить это письмо</span></li>
    </ul>
</div>
<div class="row py-4"></div>
<div class="block catch">
    <p class="test">Нажмите на кнопку, чтобы подтвердить, что Вы ознакомились с приведенными выше рекомендациями</p>
    <div class="row py-2"></div>
<a href="{{ route('course.materials') }}" class="btn btn-primary">Подтверждаю</a>
</div>



@endsection
