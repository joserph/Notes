<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" id="id">
{!! Form::label('nombre', 'Nombre') !!}
<div class="row">
	<div class="col-md-12 has-error">
		{!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombreDelete', 'disabled']) !!}
	</div>
</div>
<br>	
<button tipe="submit" class="btn btn-danger" id="delete-note"><i class="fa fa-times-circle fa-fw"></i> Eliminar</button>