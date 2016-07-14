@extends('template.layout')

@section('content')

<div class="s12 m4 l8">
	<h4 class="center">Iniciar sesión</h4>
	<!-- Errors -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
			<strong><i class="fa fa-exclamation-triangle fa-fw"></i></strong> Por favor corrige los siguentes errores:<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<!-- Message -->
	@include('flash::message')

	<!-- Forms -->
	{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
		<div class="row">
        	<div class="input-field col s12">						
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'autofocus']) !!}							
			</div>
			<div class="input-field col s12">							
				{!! Form::label('password', 'Password') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}							
			</div>
			<p>
		      	<input type="checkbox" id="remember" checked="checked"name="remember" />
		      	<label for="remember">Recuérdame</label>
		    </p>	
			
			<div class="input-field col s6">				
				{!! Form::submit('Iniciar sesión', ['class' => 'waves-effect waves-light btn light-blue darken-4']) !!}
				<p>
					<a href="/password/email"><i class="material-icons">vpn_key</i> ¿Olvidaste tu contraseña?</a>	
				</p>			
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection