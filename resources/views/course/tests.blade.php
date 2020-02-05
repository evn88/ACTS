@extends('layouts.course')
@section('content')

    <course-test-component title="{{ $plan->name }}" plan-id="{{ $plan->id }}">загрузка...</course-test-component>

@endsection
