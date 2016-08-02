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
        <faovs list="{{ $faovs }}"></faovs>
        <template id="faovs-template">
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
                        <tr v-for="faov in list">
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
        </template>
        <div class="panel-body">
            
            
        </div>
    </div>
	
	
    @section('scripts')		
        <script src="{{ asset('js/vue.min.js') }}"></script>
        <script src="{{ asset('js/vue-resource.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @endsection
@endsection