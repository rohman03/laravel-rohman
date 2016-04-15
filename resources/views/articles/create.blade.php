@extends("layouts.application")
@section("content")
{!! Form::open(['url' => 'articles', 'class' => 'form-horizontal', 'role' => 'form']) !!}
@include("articles.form")
{!! Form::close() !!}
@stop