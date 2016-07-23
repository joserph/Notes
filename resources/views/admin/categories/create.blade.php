<div class="error"></div>
{!! Form::open(['route' => 'categories.store', 'class' => 'add-category']) !!}
	{!! Form::hidden('id_user', Auth::user()->id) !!}
 	{!! Form::hidden('update_user', Auth::user()->id) !!}
	{!! Form::label('nombre', 'Nombre') !!}
	<div class="row">
		<div class="col-md-12">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'myInput', 'placeholder' => 'Nombre de la categoría']) !!}
		</div>
	</div>
	<br>	
    <button tipe="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear</button>
{!! Form::close() !!}
