@extends("layouts.application")
@section("content")
  {!! Form::open(['url' => 'sessions', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    <div class="form-group label-floating">
      {!! Form::label('name', 'name', array('class' => 'col-lg-3 control-label')) !!}
      <div class="col-lg-4">
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
        <span class="help-block">Required</span>
        {!! $errors->first('name') !!}
      </div>
      <div class="clear"></div>
    </div>

    <div class="form-group label-floating">
      {!! Form::label('password', 'Password', array('class' => 'col-lg-3 control-label')) !!}
      <div class="col-lg-4">
        {!! Form::password('password', array('class' => 'form-control')) !!}
        <span class="help-block">Required</span>
        {!! $errors->first('password') !!}
      </div>
      <div class="clear"></div>
    </div>

    <div class="form-group label-floating">
      {!! Form::label('remember', 'Remember Me', array('class' => 'col-lg-3 control-label')) !!}
       
        {!! Form::checkbox('remember', null, array('class' => 'form-control')) !!}
      </div>
      <div class="clear"></div>
    </div>

    <div class="form-group label-floating">
      <div class="col-lg-3"></div>
      <div class="col-lg-4">
        {!! Form::submit('Login', array('class' => 'btn btn-raised btn-primary')) !!}
      </div>
      <div class="clear"></div>
    </div>

  {!! Form::close() !!}
{!! link_to('reset-password/', 'Forgot Password') !!}
@stop
