@extends('layouts.course')
@section('content')

<h3 class="headtxt mar">{{ $lesson->name }}</h3>

{!! $lesson->lesson_text !!}

<div class="block">
    <div class="row_1">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
        <a href="#" class="btn btn-primary">Следующий урок</a>
    </div>
</div>

@endsection
