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
        
        <!-- Water -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-tint fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countWaters }}</div>
                            @if($countWaters > 1)
                                <div>Pagos de agua!</div>
                            @else
                                <div>Pago de agua!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('water.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Light -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-lightbulb-o fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countLights }}</div>
                            @if($countLights > 1)
                                <div>Pagos de luz!</div>
                            @else
                                <div>Pago de luz!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('lights.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>     

        <!-- Phone -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-phone fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countPhones }}</div>
                            @if($countPhones > 1)
                                <div>Pagos de teléfono!</div>
                            @else
                                <div>Pago de teléfono!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('phones.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>  

        <!-- Phone -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-wheelchair fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countSocialSecurities }}</div>
                            @if($countSocialSecurities > 1)
                                <div>Pagos de seguro social!</div>
                            @else
                                <div>Pago de seguro social!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('securities.index') }}">
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