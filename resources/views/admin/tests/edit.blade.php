@extends('layouts.admin')
@section('content')

<h3 class="headtxt mar">{{ $test->name }}</h3>


<div class="card">
    <h5 class="card-header">Редактирование урока</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ route('tests.update', $test->id) }}" method="POST">
            @method('PUT')
            @include('admin.tests.__form')
        </form>
    </div>
</div>


@endsection
