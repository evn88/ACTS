@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-book" aria-hidden="true"></i> Учебный план</h1>
<p class="heading">В данном разделе вы можете ознакомиться со всеми темами для изучения, входящими в учебный план,
            а также с их подробным содержанием.
</p>
<h3 class="plans">Темы для изучения</h3>
<div class="row_1 justify-content-end">
    <a href="{{ route('plans.create') }}" class="btn btn-primary">Создать новую тему</a>
</div>
<div class="row_1">
    <div class="card_plan">
        @foreach($plans as $plan)
            <div class="cell">
                <a href="{{ route('plans.show', $plan->id) }}">
                    <img src="{{ asset($plan->img) }}" alt="{{ $plan->name }}">
                    <p class="text">{{ $plan->name }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>




@endsection