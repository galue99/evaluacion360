@extends('layouts.login')


@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Evaluacion</b>360</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Introduzca sus datos para iniciar sesion</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-push-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>

  </div>
</div>

@stop