@extends('layouts.admin')
@section('content')

<h3 class="headtxt mar">{{$plan->name}}</h3>


<div class="card">
    <h5 class="card-header">Добавить новый вопрос</h5>
    <div class="card-body">
        @include('errors.form')

        <form action="{{ url('/admin/tests') }}" method="POST">
            <input type="hidden" name="plan_id" value="{{$plan->id}}">
            @include('admin.tests.__form')
        </form>
    </div>
  </div>


</div>
@endsection
