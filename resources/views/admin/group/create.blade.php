@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>


<form action="{{ url('/admin/groups') }}" method="POST">
    <div class="card">
        <h5 class="card-header">Добавить новую группу</h5>
        <div class="card-body">
            @include('errors.form')
            @include('admin.group.__form')
        </div>
        <div class="card-footer">
            @include('admin.group.__card_footer')
        </div>
    </div>
</form>

@endsection
