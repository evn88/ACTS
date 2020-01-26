@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>


<div class="card">
    <h5 class="card-header">Добавить новую группу</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/plans') }}" method="POST">
            @include('admin.plans.__form')
        </form>
    </div>
  </div>


</div>
@endsection