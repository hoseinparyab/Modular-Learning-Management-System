@extends('course::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('course.name') !!}</p>
@endsection
