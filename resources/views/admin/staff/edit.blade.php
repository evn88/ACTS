@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>

<form action="{{ route('staff.update', $user->id) }}" method="POST">
    <div class="card">
        <h5 class="card-header">Редактирование сотрудника</h5>
        <div class="card-body">
            @include('errors.form')
            @method('PUT')
            @include('admin.staff.__form')
        </div>
        <div class="card-footer">
            @include('admin.staff.__card_footer', $user)
        </div>
    </div>
</form>
@include('admin.modal.confirm_delete')
@endsection
