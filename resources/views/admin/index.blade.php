@extends('template.layout')

@section('title', 'Auth System') 

@section('content')
    <h2 class="page-header"><i class="fa fa-cogs fa-fw"></i> Panel de administración</h2>
    <ol class="breadcrumb">
        <li><a href="/">Inicio</a></li>
        <li class="active">Panel de administración</li>
    </ol>
    <div class="row">
        <!-- Notes -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-sticky-note fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countNotes }}</div>
                            @if($countNotes > 1)
                                <div>Notas!</div>
                            @else
                                <div>Nota!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('notes.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Activities -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-puzzle-piece fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countActivities }}</div>
                            @if($countActivities > 1)
                                <div>Actividades!</div>
                            @else
                                <div>Actividad!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('activities.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
    </div>

@endsection