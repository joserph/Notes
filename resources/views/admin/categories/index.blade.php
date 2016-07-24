@extends('template.layout')

@section('title') Categorias | App notes @stop

@section('content')
	<div class="success"></div>
	<h2 class="page-header"><i class="fa fa-random fa-fw"></i> 
		Categorias
		<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i></button>
	</h2>
    <ol class="breadcrumb">
        <li><a href="/">Inicio</a></li>
        <li><a href="{{ route('admin.index') }}">Panel de administración</a></li>
        <li class="active">Categorias</li>
    </ol>
   <!-- .table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>
                <th class="text-center">Nombre</th>               
                <th class="text-center">Acción</th>                
            </tr>            
            
            <tbody id="tr-categories"></tbody>
            
        </table>
    </div>
    <!-- /.table -->
    <!-- Modal Add-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle fa-fw"></i> Crear categoría</h4>
                </div>
                <div class="modal-body">
                    @include('admin.categories.create')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square fa-fw"></i> Editar categoría</h4>
                </div>
                <div class="modal-body">
                    @include('admin.categories.edit')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash fa-fw"></i> Eliminar categoría</h4>
                </div>
                <div class="modal-body">
                    @include('admin.categories.delete')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
	
    @section('scripts')
        <script src="{{ asset('js/pinterest_grid.js') }}"></script>
        <script src="{{ asset('js/modules/scriptsCategory.js') }}"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            });
        </script>
    @endsection
@endsection