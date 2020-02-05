@extends('layouts.course')
@section('content')

    <h3 class="headtxt">{{ $plans->name }}</h3>

<div class="card_plan">
    <div class="row_1">
        <div class="cellinf">
            <h5>Содержание модуля:</h5>
            <ol class="rectangle">
                <li><a class="mark" href="#">Список уроков</a>
                    <ul>
                        @if($plans->lessons->count())

                            @foreach($plans->lessons as $lesson)
                                <li><a href="{{ route('course.lessons', $lesson->id) }}">{{ $lesson->name }}</a></li>
                            @endforeach

                        @else
                            <li>Уроков нет. </li>
                        @endif
                    </ul>
                </li>

                <li><a class="mark" href="#">Тест</a>
                    <ul>
                        @if($plans->tests->count())
                            <p>Нажимая кнопку "Начать тестирование" вы соглашаетесь начать тестирование, отменить это действие нельзя.</p>
                            <p>Тест содержит {{ $plans->tests->count() }} вопроса(-ов)</p>
                            <a href="{{ route('course.tests', $plans->id) }}" class="btn btn-primary">Начать тестирование</a>

                        @else
                            <li>Тестов нет.</li>
                        @endif
                    </ul>
                </li>

            </ol>
        </div>
    </div>
</div>


@endsection
