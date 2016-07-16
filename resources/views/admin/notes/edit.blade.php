<div class="error"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" id="id">
{!! Form::hidden('update_user', Auth::user()->id, ['id' => 'updateUser']) !!}
{!! Form::label('nombre', 'Nombre') !!}
<div class="row">
	<div class="col-md-12">
		{!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombreEdit', 'placeholder' => 'Nombre de la nota']) !!}
	</div>
</div>
{!! Form::label('contenido', 'Contenido') !!}
<div class="row">
	<div class="col-md-12">
		{!! Form::textarea('contenido', null, ['class' => 'form-control', 'id' => 'contenidoEdit', 'placeholder' => 'Contenido de la nota', 'rows' => '3']) !!}
	</div>
</div>
{!! Form::label('fecha', 'Fecha') !!}
<div class="row">
	<div class="col-md-6">
		{!! Form::date('fecha', null, ['class' => 'form-control', 'id' => 'fechaEdit', 'placeholder' => 'dd/mm/yyyy']) !!}
	</div>
</div>
<br>	
<button tipe="submit" class="btn btn-warning" id="edit-note"><i class="fa fa-refresh"></i> Actualizar</button>

