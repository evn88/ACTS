@extends('layouts.admin')
@section('content')

<h3 class="headtxt mar">Пароли и учетные записи</h3>


<div class="card">
    <h5 class="card-header">Добавить новый урок</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/lessons') }}" method="POST">
            @include('admin.lessons.__form')
        </form>
    </div>
  </div>


</div>
@endsection