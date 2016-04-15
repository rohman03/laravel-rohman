@extends("layouts.application")
@section("content")
  {!! Form::open(['url' => 'users', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    <div class="form-group label-floating">
      {!! Form::label('email', 'Email', array('class' => 'col-lg-3 control-label')) !!}
      <div class="col-lg-4">
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
        <span class="help-block">Required</span>
        {!! $errors->first('email') !!}
      </div>
      <div class="clear"></div>
    </div>

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
      {!! Form::label('password_confirmation', 'Password Confirm', array('class' => 'col-lg-3 control-label')) !!}
      <div class="col-lg-4">
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
      </div>
      <div class="clear"></div>
    </div>

    <div class="form-group label-floating">
      <div class="col-lg-3"></div>
      <div class="col-lg-4">
        {!! Form::submit('Signup', array('class' => 'btn btn-raised btn-primary')) !!}
      </div>
      <div class="clear"></div>
    </div>
  {!! Form::close() !!}

@stop
