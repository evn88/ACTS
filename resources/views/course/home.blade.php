@extends('layouts.course')
@section('content')

<h1><i class="fa fa-home" aria-hidden="true"></i> Главная страница</h1>
<p class="heading">Здравствуйте, {{ $username }}! Вы проходите обучение по кибербезопасности.<br>
    Вам доступны новые лекции и тесты для прохождения.<br></p>

<h3>Ваш прогресс</h3>

<div class="row_1">
    <div class="card_progress course">
        <div class="cell">
            <div class="chart" data-percent="30">
                <p class="count">30%</p>
            </div>
        </div>
        <div class="info_progress">
            <p class="info_text">Так держать!</p>
            <p>Не останавлявайтесь на достигнутом.
                Впереди еще много интересного!
            </p>
            <a href="{{ route('course.materials') }}" class="btn btn-primary">Открыть учебные материалы</a>
        </div>
    </div>

</div>



@endsection
