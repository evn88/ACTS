@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>


<div class="card">
    <h5 class="card-header">Редактирование сотрудника</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ route('plans.update', $plans->id) }}" method="POST">
            @method('PUT')
            @include('admin.plans.__form')
        </form>
    </div>
  </div>


</div>
@endsection