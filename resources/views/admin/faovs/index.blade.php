@extends('template.layout')

@section('title') Pagos faov | App notes @stop

@section('content')
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

    <div class="panel-body">
        @if($faovs->count())
            <!-- .table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                    <tr>
                        <th>#</th>
                        <th class="text-center">Periodo</th>
                        <th class="text-center">Estatus</th>  
                        <th class="text-center">Pagado por</th>
                        <th class="text-center">Monto</th>
                        <th class="text-center">Fecha</th>  
                        <th class="text-center">Acción</th>
                    </tr>            
                    @foreach ($faovs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="text-center">{{ $item->periodo }}</td>
                        <td class="text-center">{{ $item->estatus }}</td>
                        <td class="text-center">{{ $item->pagado_por }}</td>
                        <td class="text-center">{{ $item->monto }}</td>
                        <td class="text-center">{{ $item->fecha_pago }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i> Editar</a>
                        </td>                          
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.table -->
        @else
            <div class="well">
                No has creado ningún pago del Faov.
            </div>
        @endif
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle fa-fw"></i> Crear pago faov</h4>
                </div>
                <div class="modal-body">
                    @include('admin.securities.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square fa-fw"></i> Editar pago faov</h4>
                </div>
                <div class="modal-body">
                    @include('admin.securities.edit')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal Delete-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash fa-fw"></i> Eliminar pago faov</h4>
                </div>
                <div class="modal-body">
                    @include('admin.securities.delete')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
	
    @section('scripts')		
        <script src="{{ asset('js/pinterest_grid.js') }}"></script>
        <script src="{{ asset('js/modules/scriptsSecurity.js') }}"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            });
        </script>
    @endsection
@endsection