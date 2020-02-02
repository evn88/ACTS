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
            @foreach($plans->plans as $plan)
            <div class="cell">
                <a href="{{ route('course.plansinf') }}">
                    <img src="{{ asset('storage/'.$plan->img) }}" alt="{{ $plan->name }}">
                    <p class="text">{{ $plan->name }}</p>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
