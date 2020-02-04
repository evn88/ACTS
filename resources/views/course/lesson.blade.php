@extends('layouts.course')
@section('content')

<h3 class="headtxt mar">{{ $lesson->name }}</h3>

<div class="ck-content">
    {!! $lesson->lesson_text !!}
</div>

@if(!$next)
    <p class="alert alert-info">Поздравляем! Вы успешно закончили обучение по теме, теперь пора проверить усвоенный материал.</p>
@endif


<div class="block btn-lesson">
    <div class="row_1">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
        @if($next)
            <a href="{{ route('course.lessons', $next) }}" class="btn btn-primary">Следующий урок</a>
        @else
            <a href="{{ route('course.plans', $plan_id)  }}" class="btn btn-primary">Перейти к тестированию</a>
        @endif

    </div>
</div>

@endsection
