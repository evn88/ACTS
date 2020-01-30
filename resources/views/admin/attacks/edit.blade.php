@extends('layouts.admin')
@section('content')

<h3 class="headtxt mar">{{$plan->name}}</h3>


<div class="card">
    <h5 class="card-header">Редактирование шаблона атаки</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ route('attacks.update', $attacks->id) }}" method="POST">
            @method('PUT')
            @include('admin.attacks.__form')
        </form>
    </div>
  </div>


</div>
@endsection
