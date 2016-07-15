@extends('template.layout')

@section('title') Panel de Administración | App notes @stop

@section('content')
	<div class="success"></div>
	<h2 class="page-header"><i class="fa fa-sticky-note fa-fw"></i> 
		Notas
		<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i></button>
	</h2>
	 <!-- .table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>
                <th class="text-center">Nombre</th>               
                <th class="text-center">Acción</th>                
            </tr>            
            
            <tbody id="tr-tag"></tbody>
            
        </table>
    </div>
    <!-- /.table -->
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
	
    @section('scripts')
		<script src="{{ asset('js/myScripts.js') }}"></script>
    @endsection
@endsection