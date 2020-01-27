@extends('layouts.admin')
@section('content')

<h3 class="headtxt mar">Пароли и учетные записи</h3>


<div class="card">
    <h5 class="card-header">Редактирование урока</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ route('lessons.update', 1) }}" method="POST">
            @method('PUT')
            @include('admin.lessons.__form')
        </form>
    </div>
  </div>


</div>
@endsection