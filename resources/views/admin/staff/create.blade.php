@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>


<div class="card">
    <h5 class="card-header">Добавление сотрудника</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/staff') }}" method="POST">
            @include('admin.staff.__form')
        </form>
    </div>
  </div>


</div>
@endsection