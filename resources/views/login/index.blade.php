@extends('layouts.login')


@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Evaluacion</b>360</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Introduzca sus datos para iniciar sesión</p>

    {!! Form::open(array('route' => 'login.store','class'=>'form')) !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-push-8">
          {!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
        </div>
      </div>
    {!! Form::close() !!}

  </div>
</div>

@stop