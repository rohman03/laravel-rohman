<div class="form-group label-floating">
  {!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!}
  <div class="col-lg-9">
    {!! Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
    <span class="help-block">Required, min 10 char, unique</span>
    {!! $errors->first('title') !!}
  </div>
  <div class="clear"></div>
</div>
<div class="form-group label-floating">
  {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
  <div class="col-lg-9">
    {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!}
    <span class="help-block">Required, min 100 char</span>
    {!! $errors->first('content') !!}
  </div>
  <div class="clear"></div>
</div>
<div class="form-group">
  <div class="col-lg-3"></div>
  <div class="col-lg-9">
    {!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}
  </div>
  <div class="clear"></div>
</div>