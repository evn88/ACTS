@extends('layouts.admin')
@section('content')

<h3 class="headtxt">{{ $plan->name }}</h3>
<div class="row_1 justify-content-end">
    <div class="right plans-right">
        <a href="{{ route('lessons.create', $plan->id, 'test') }}" class="btn btn-primary">Создать урок</a>
        <a class="btn btn-secondary">Создать тест</a>
        <a class="btn btn-info">Создать атаку</a>
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
                            <li><a href="#">Уроков еще нет</a></li>
                        @endif
                    </ul>
                </li>

                <li><a class="mark" href="#">Тест</a>
                    <ul>
                        @if($plan->lessons->count())

                            @foreach($plan->tests as $test)
                            <li><a href="">{{ $test->name }}</a>
                                <a href="javascript:;"
                                    data-toggle="modal"
                                    data-target="#deleteConfirm"
                                    data-route="{{ route('lessons.destroy', $test->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach

                        @else
                            <li><a href="#">Тестов еще нет</a></li>
                        @endif
                    </ul>
                </li>
                <li><a class="mark" href="#">Имитация атаки</a>
                    <ul>
                        @if($plan->lessons->count())

                            @foreach($plan->attacks as $attack)
                            <li><a href="">{{ $attack->name }}</a>
                                <a href="javascript:;"
                                    data-toggle="modal"
                                    data-target="#deleteConfirm"
                                    data-route="{{ route('lessons.destroy', $attack->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach

                        @else
                            <li><a href="#">Шаблонов атаки еще нет</a></li>
                        @endif
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>

@include('admin.modal.confirm_delete')

@endsection