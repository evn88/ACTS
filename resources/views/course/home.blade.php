@extends('layouts.course')
@section('content')

<h1><i class="fa fa-home" aria-hidden="true"></i> Главная страница</h1>
<p class="heading">Здравствуйте, Ваше имя! Вы проходите обучение по кибербезопасности.<br>
    Вам доступны новые лекции и тесты для прохождения.<br></p>

<h3>Ваш прогресс</h3>

<div class="row_1">
    <div class="card_progress course">
        <div class="cell">
            <div class="chart" data-percent="30">
                <p class="count">30%</p>
            </div>
        </div>
        <div class="cell">
            <p class="date">Плановая дата окончания:</p>
            <p class="text">15.03.2020</p>
        </div>
    </div>
    <div class="info_progress">
        <p class="info_text">Вы идете по плану</p>
        <p>Так держать! Не останавлявайтесь на достигнутом.
            Впереди еще много интересного!
        </p>
        <a href="#" class="btn btn-primary">Продолжить</a>
    </div>
</div>



@endsection