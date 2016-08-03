@extends('template.layout')

@section('title') Pagos faov | App notes @stop

@section('content')
    <div id="faov">
        <div class="success"></div>
        <h2 class="page-header"><i class="fa fa-wheelchair fa-fw"></i> 
            Pagos faov
            <a href="{{ route('faovs.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i></a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="/">Inicio</a></li>
            <li><a href="{{ route('admin.index') }}">Panel de administración</a></li>
            <li class="active">Pagos faov</li>
        </ol>

        <form action="#" @submit.prevent="AddNewFaov" method="POST">
            <div class="form-group">
                <input type="hidden" v-model="newFaov.id_user" value="{{ Auth::user()->id }}">
                <input type="hidden" v-model="newFaov.update_user" value="{{ Auth::user()->id }}">
                {!! Form::label('periodo', 'Periodo') !!}
                <div class="row">
                    <div class="col-md-4">
                        <input type="month" name="periodo" class="form-control" placeholder="mm-yyyy" v-model="newFaov.periodo">
                        <p class="text-primary" v-if="!isValid" v-show="!validation.periodo">El campo periodo es requerido</p>
                    </div>
                </div>
                {!! Form::label('estatus', 'Estatus') !!}
                <div class="row">
                <div class="col-md-4">
                    {!! Form::select('estatus', [
                        'pago'      => 'Pago', 
                        'por pagar' => 'Por pagar',
                        'vencido'   => 'Vencido'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estatus', 'v-model' => 'newFaov.estatus']) !!}
                        <p class="text-primary" v-if="!isValid" v-show="!validation.estatus">El campo estatus es requerido</p>
                </div>
                </div>
                {!! Form::label('pagado_por', 'Pagado por') !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::text('pagado_por', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la persona que paga', 'v-model' => 'newFaov.pagado_por']) !!}                        
                    </div>
                </div>
                {!! Form::label('monto', 'Monto') !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'Monto', 'v-model' => 'newFaov.monto']) !!}                        
                    </div>
                </div>
                {!! Form::label('fecha_pago', 'Fecha') !!}
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::date('fecha_pago', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy', 'v-model' => 'newFaov.fecha_pago']) !!}
                    </div>
                </div>
                <br>    
                <button type="submit" :disabled="!isValid" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear</button>
            </div>
        </form>
        <hr>
        <!-- .table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <th>#</th>
                        <th class="text-center">Periodo</th>
                        <th class="text-center">Estatus</th>  
                        <th class="text-center">Pagado por</th>
                        <th class="text-center">Monto</th>
                        <th class="text-center">Fecha</th>  
                        <th class="text-center">Acción</th>
                    </thead>            
                    <tbody>
                        <tr v-for="faov in faovs">
                            <td>@{{ faov.id }}</td>
                            <td class="text-center">@{{ faov.periodo }}</td>
                            <td class="text-center">@{{ faov.estatus }}</td>
                            <td class="text-center">@{{ faov.pagado_por }}</td>
                            <td class="text-center">@{{ faov.monto }}</td>
                            <td class="text-center">@{{ faov.fecha_pago }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i> Editar</a>
                            </td>                          
                        </tr>
                    </tbody>                   
                </table>
            </div>
        <!-- /.table -->

        <pre>
            @{{ $data | json }}
        </pre>
        <div class="panel-body">
            
            
        </div>
    </div>
	
	
    @section('scripts')		
        <script src="{{ asset('js/vue.min.js') }}"></script>
        <script src="{{ asset('js/vue-resource.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @endsection
@endsection