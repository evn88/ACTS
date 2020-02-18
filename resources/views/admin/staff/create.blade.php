@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>

<form action="{{ url('/admin/staff') }}" method="POST">
    <div class="card">
        <h5 class="card-header">Добавление сотрудника</h5>
        <div class="card-body">
            @include('errors.form')
            @include('admin.staff.__form')
        </div>
        <div class="card-footer">
            @include('admin.staff.__card_footer')
        </div>
    </div>
</form>

@endsection
