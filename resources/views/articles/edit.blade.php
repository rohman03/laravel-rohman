@extends("layouts.application")
@section("content")
{!! Form::model($article, ['route' => array('articles.update', $article->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
@include("articles.form")
{!! Form::close() !!}
@stop