<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" id="id">
{!! Form::label('periodo', 'Periodo') !!}
<div class="row">
	<div class="col-md-12 has-error">
		{!! Form::text('periodo', null, ['class' => 'form-control text-uppercase', 'id' => 'periodoDelete', 'disabled']) !!}
	</div>
</div>
<br>	
<button tipe="submit" class="btn btn-danger" id="delete-faov"><i class="fa fa-times-circle fa-fw"></i> Eliminar</button>