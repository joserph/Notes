@extends('template.layout')

@section('title') Pagos Forma 99030 | App notes @stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
@endsection
@section('content')
    <div class="success"></div>
    <h2 class="page-header"><i class="fa fa-home fa-fw"></i> 
        Pagos Forma 99030
        <button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i></button>
    </h2>
    <ol class="breadcrumb">
        <li><a href="/">Inicio</a></li>
        <li><a href="{{ route('admin.index') }}">Panel de administración</a></li>
        <li class="active">Pagos Forma 99030</li>
    </ol>

    <!-- Panels notes -->
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Año {{ $anioActual }} <span class="pull-right"><button class="btn btn-info btn-xs">Total pagado <i class="fa fa-arrow-right"></i> <span id="total"></span></button></span></h3>
            </div>
            <div class="panel-body">
                <ul class="list-group" id="listF99030">
      
                </ul>
            </div>
        </div>        
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle fa-fw"></i> Crear pago Forma 99030</h4>
                </div>
                <div class="modal-body">
                    @include('admin.iva99030.create')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square fa-fw"></i> Editar pago Forma 99030</h4>
                </div>
                <div class="modal-body">
                    @include('admin.iva99030.edit')
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash fa-fw"></i> Eliminar pago Forma 99030</h4>
                </div>
                <div class="modal-body">
                    @include('admin.iva99030.delete')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    @section('scripts')
        <script src="{{ asset('js/daterangepicker.js') }}"></script>   
        <script src="{{ asset('js/pinterest_grid.js') }}"></script>
        <script src="{{ asset('js/modules/scriptsF99030.js') }}"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            });
        </script>
    @endsection
@endsection