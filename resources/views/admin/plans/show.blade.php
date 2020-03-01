@extends('layouts.admin')
@section('content')

<h3 class="headtxt">{{ $plan->name }}</h3>
<div class="row_1">
    <div class="left plans-btn">
        <a href="{{ route('lessons.create', $plan->id) }}" class="btn btn-primary">Создать урок</a>
        <a href="{{ route('tests.create', $plan->id) }}" class="btn btn-secondary">Создать вопрос</a>
        <a href="{{ route('attacks.create', $plan->id) }}" class="btn btn-info">Создать атаку</a>
    </div>
    <div class="right"><a href="javascript:;"
        class="btn btn-danger"
        data-toggle="modal"
        data-target="#deleteConfirm"
        data-route="{{ route('plans.destroy', $plan->id) }}">
        <i class="fa fa-trash-o" aria-hidden="true"></i>  Удалить учебный план
        </a>
    </div>
</div>
<div class="card_plan">
    <div class="row_1">
        <div class="cellinf">
            <h5>Содержание модуля:</h5>
            <ol class="rectangle">
                <li><a class="mark" href="#">Список уроков</a>
                    <ul>
                        @if($plan->lessons->count())

                            @foreach($plan->lessons as $lesson)
                            <li><a href="{{ route('lessons.edit', $lesson->id) }}">{{ $lesson->name }}</a>
                                <a href="javascript:;"
                                    data-toggle="modal"
                                    data-target="#deleteConfirm"
                                    data-route="{{ route('lessons.destroy', $lesson->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach

                        @else
                            <li>Уроков еще нет. <a href="{{ route('lessons.create', $plan->id) }}">Создать новый урок?</a></li>
                        @endif
                    </ul>
                </li>

                <li><a class="mark" href="#">Тест</a>
                    <ul>
                        @if($plan->tests->count())

                            @foreach($plan->tests as $test)
                            <li><a href="{{ route('tests.edit', $test->id) }}">{{ $test->name }}</a>
                                <a href="javascript:;"
                                    data-toggle="modal"
                                    data-target="#deleteConfirm"
                                    data-route="{{ route('tests.destroy', $test->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach

                        @else
                            <li>Тестов еще нет. <a href="{{ route('tests.create', $plan->id) }}">Создать тест?</a></li>
                        @endif
                    </ul>
                </li>
                <li><a class="mark" href="#">Имитация атаки</a>
                    <ul>
                        @if($plan->attacks->count())

                            @foreach($plan->attacks as $attack)
                            <li><a href="{{ route('attacks.edit', $attack->id) }}">{{ $attack->name }}</a>
                                <a href="javascript:;"
                                    data-toggle="modal"
                                    data-target="#deleteConfirm"
                                    data-route="{{ route('attacks.destroy', $attack->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach

                        @else
                            <li>Шаблонов атаки еще нет. <a href="{{ route('attacks.create', $plan->id) }}">Создать новый шаблон?</a></li>
                        @endif
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>

<a href="{{ route('plans.index') }}" class="btn btn-secondary">Назад к списку тем</a>
@include('admin.modal.confirm_delete')

@endsection
