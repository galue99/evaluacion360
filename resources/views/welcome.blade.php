@extends('layouts.blank')
@section('title','Bienvenida')

@section('content')
<div class="lockscreen-wrapper">
	<div class="lockscreen-logo">
		<a href=""><b>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</b></a>
	</div>
	<div class="lockscreen-name"><h2>No posee evaluación activa</h2></div>	

	<div class="text-center">
		<a href="{{ URL::to('/logout') }}">Cerrar Sesion <i class="fa fa-sign-out"></i></a>
	</div>
	<div class="lockscreen-footer text-center">
		Copyright © 2015-2016 <b><a href="{{ URL::to('/logout') }}" class="text-black">Evaluacion360.</a></b><br>
		All rights reserved.
	</div>
</div>


@stop
