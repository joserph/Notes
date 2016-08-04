<div class="error"></div>
{!! Form::open(['route' => 'faovs.store', 'class' => 'add-faov']) !!}
    {!! Form::hidden('id_user', Auth::user()->id) !!}
    {!! Form::hidden('update_user', Auth::user()->id) !!}
    {!! Form::label('periodo', 'Periodo') !!}
    <div class="row">
        <div class="col-md-6">
            <input type="month" name="periodo" class="form-control" placeholder="mm-yyyy" id="myInput">
        </div>
    </div>
    {!! Form::label('estatus', 'Estatus') !!}
    <div class="row">
        <div class="col-md-4">
            {!! Form::select('estatus', [
                'pago'      => 'Pago', 
                'por pagar' => 'Por pagar',
                'vencido'   => 'Vencido'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estatus']) !!}
        </div>
    </div>
    {!! Form::label('pagado_por', 'Pagado por') !!}
    <div class="row">
        <div class="col-md-12">
            {!! Form::text('pagado_por', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la persona que paga']) !!}
        </div>
    </div>
    {!! Form::label('monto', 'Monto') !!}
    <div class="row">
        <div class="col-md-6">
            {!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'Monto']) !!}
        </div>
    </div>
    {!! Form::label('fecha_pago', 'Fecha') !!}
    <div class="row">
        <div class="col-md-6">
            {!! Form::date('fecha_pago', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy']) !!}
        </div>
    </div>
    <br>    
    <button tipe="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear</button>
{!! Form::close() !!}
