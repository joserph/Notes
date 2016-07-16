<div class="error"></div>
{!! Form::open(['route' => 'activities.store', 'class' => 'add-activity']) !!}
	{!! Form::hidden('id_user', Auth::user()->id) !!}
 	{!! Form::hidden('update_user', Auth::user()->id) !!}
	{!! Form::label('nombre', 'Nombre') !!}
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'myInput', 'placeholder' => 'Nombre de la actividad']) !!}
		</div>
	</div>
	{!! Form::label('contenido', 'Contenido') !!}
	<div class="row">
		<div class="col-md-12">
			{!! Form::textarea('contenido', null, ['class' => 'form-control', 'placeholder' => 'Contenido de la actividad', 'rows' => '3']) !!}
		</div>
	</div>
	{!! Form::label('tipo', 'Tipo') !!}
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('tipo', [
                    'fija' => 'Fija',
                    'temporal' => 'Temporal'], null, ['class' => 'form-control', 'placeholder' => 'Seleccionar tipo de actividad']) !!}
		</div>
	</div>
	{!! Form::label('fecha', 'Fecha') !!}
	<div class="row">
		<div class="col-md-6">
			{!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy']) !!}
		</div>
	</div>
	<br>	
    <button tipe="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear</button>
{!! Form::close() !!}
