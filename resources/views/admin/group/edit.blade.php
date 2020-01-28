@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>


<div class="card">
    <h5 class="card-header">Редактирование сотрудника</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ route('groups.update', $groups->id) }}" method="POST">
            @method('PUT')
            @include('admin.group.__form')
        </form>
        @include('admin.modal.confirm_delete')
    </div>
  </div>


</div>
@endsection