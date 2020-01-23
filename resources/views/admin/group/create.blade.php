@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>


<div class="card">
    <h5 class="card-header">Добавить новую группу</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/groups') }}" method="POST">
            @include('admin.group.__form')
        </form>
    </div>
  </div>


</div>
@endsection