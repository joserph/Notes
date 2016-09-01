@extends('template.layout')

@section('title') Panel de Administración | App Notes @endsection 

@section('content')
    <h1 class="page-header"><i class="fa fa-cogs fa-fw"></i> Panel de administración</h1>
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

        <!-- Social Security -->
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

        <!-- Faov -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-home fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countFaovs }}</div>
                            @if($countFaovs > 1)
                                <div>Pagos de FAOV!</div>
                            @else
                                <div>Pago de FAOV!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('faovs.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>  

        <!-- Sumat -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-star fa-5x"></i>                                                       
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge numeroPanel">{{ $countSumats }}</div>
                            @if($countSumats > 1)
                                <div>Pagos de SUMAT!</div>
                            @else
                                <div>Pago de SUMAT!</div>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('sumats.index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>           
    </div>

    <div class="row">
    <h2 class="page-header text-center"><i class="fa fa-calculator"></i> Gastos de impuestos</h2>
        <div class="col-lg-6 col-md-6">            
            <h3 class="page-header">Impuesto al Valor Agregado (I.V.A.)</h3>
                <!-- I.V.A. 99035 -->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="pull-left">
                            @if($countIva99035 > 1)
                                <div class="text-uppercase">Pagos de F-99035!</div>
                            @else
                                <div class="text-uppercase">Pago de F-99035!</div>
                            @endif
                        </span>
                        <span class="badge pull-right">{{ $countIva99035 }}</span>   
                        <div class="clearfix"></div>                    
                    </div>
                    <a href="{{ route('iva99035s.index') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>    

                <!-- I.V.A. 99030 -->
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <span class="pull-left">
                            @if($countIva99030 > 1)
                                <div class="text-uppercase">Pagos de F-99030!</div>
                            @else
                                <div class="text-uppercase">Pago de F-99030!</div>
                            @endif
                        </span>
                        <span class="badge pull-right">{{ $countIva99030 }}</span>   
                        <div class="clearfix"></div>                    
                    </div>
                    <a href="{{ route('iva99030s.index') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>                
        </div>
        <div class="col-lg-6 col-md-6">
            <!-- I.S.L.R. -->                
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