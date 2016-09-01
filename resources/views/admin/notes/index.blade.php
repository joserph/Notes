@extends('template.layout')

@section('title') Notas | App notes @stop

@section('content')
	<div class="success"></div>
	<h2 class="page-header"><i class="fa fa-sticky-note fa-fw"></i> 
		Notas
		<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i></button>
	</h2>
    <ol class="breadcrumb">
        <li><a href="/">Inicio</a></li>
        <li><a href="{{ route('admin.index') }}">Panel de administración</a></li>
        <li class="active">Notas</li>
    </ol>
    <!-- Panels notes -->
	<div class="row" id="listNotes">
        
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle fa-fw"></i> Crear nota</h4>
                </div>
                <div class="modal-body">
                    @include('admin.notes.create')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square fa-fw"></i> Editar nota</h4>
                </div>
                <div class="modal-body">
                    @include('admin.notes.edit')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash fa-fw"></i> Eliminar nota</h4>
                </div>
                <div class="modal-body">
                    @include('admin.notes.delete')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
	
    @section('scripts')
        <script src="{{ asset('js/pinterest_grid.js') }}"></script>
        <script src="{{ asset('js/modules/scriptsNote.js') }}"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            });

            $(document).ready(function() {
                $('#listNotes').pinterest_grid({
                no_columns: 4,
                padding_x: 10,
                padding_y: 10,
                margin_bottom: 50,
                single_column_breakpoint: 700
                });
            });
        </script>
    @endsection
@endsection