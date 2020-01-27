@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-book" aria-hidden="true"></i> Учебный план</h1>


<div class="card">
    <h5 class="card-header">Добавить новую тему</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/plans') }}" method="POST">
            @include('admin.plans.__form')
        </form>
    </div>
  </div>


</div>
@endsection