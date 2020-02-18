@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>

<form action="{{ route('groups.update', $groups->id) }}" method="POST">

<div class="card">
    <h5 class="card-header">Редактирование группы</h5>
    <div class="card-body">
        @include('errors.form')
        @method('PUT')
        @include('admin.group.__form')
    </div>
    <div class="card-footer">
        @include('admin.group.__card_footer', $groups)
    </div>
</div>

</form>
@include('admin.modal.confirm_delete')
@endsection
