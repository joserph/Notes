<input type="hidden" v-model="form.id_user" value="{{ Auth::user()->id }}">
<input type="hidden" v-model="form.update_user" value="{{ Auth::user()->id }}">
{!! Form::label('periodo', 'Periodo') !!}
<div class="row">
	<div class="col-md-6">
		<input type="month" name="periodo" class="form-control" placeholder="mm-yyyy" v-model="form.periodo">
		<p class="error" v-if="errors.periodo">@{{ errors.periodo[0] }}</p>
	</div>
</div>
{!! Form::label('estatus', 'Estatus') !!}
<div class="row">
<div class="col-md-4">
	{!! Form::select('estatus', [
		'pago' 		=> 'Pago', 
		'por pagar'	=> 'Por pagar',
		'vencido'	=> 'Vencido'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estatus', 'v-model' => 'form.estatus']) !!}
		<p class="error" v-if="errors.estatus">@{{ errors.estatus[0] }}</p>
</div>
</div>
{!! Form::label('pagado_por', 'Pagado por') !!}
<div class="row">
	<div class="col-md-12">
		{!! Form::text('pagado_por', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la persona que paga', 'v-model' => 'form.pagado_por']) !!}
		<p class="error" v-if="errors.pagado_por">@{{ errors.pagado_por[0] }}</p>
	</div>
</div>
{!! Form::label('monto', 'Monto') !!}
<div class="row">
	<div class="col-md-6">
		{!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'Monto', 'v-model' => 'form.monto']) !!}
		<p class="error" v-if="errors.monto">@{{ errors.monto[0] }}</p>
	</div>
</div>
{!! Form::label('fecha_pago', 'Fecha') !!}
<div class="row">
	<div class="col-md-6">
		{!! Form::date('fecha_pago', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy', 'v-model' => 'form.fecha_pago']) !!}
		<p class="error" v-if="errors.fecha_pago">@{{ errors.fecha_pago[0] }}</p>
	</div>
</div>
<br>	
<button tipe="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear</button>
