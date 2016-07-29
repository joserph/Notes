@extends('template.layout')

@section('title') Crear pago faov | App notes @stop

@section('content')
	<div class="success"></div>
	<h2 class="page-header"><i class="fa fa-wheelchair fa-fw"></i> 
		Crear pago faov
		<a href="{{ route('faovs.index') }}" class="btn btn-default pull-right"><i class="fa fa-"></i>Atras</a>
	</h2>
    <ol class="breadcrumb">
        <li><a href="/">Inicio</a></li>
        <li><a href="{{ route('admin.index') }}">Panel de administración</a></li>
        <li class="active">Crear pago faov</li>
    </ol>

    <div id="faov">
        <div class="panel panel-default" v-clock>
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Crear pago</span>
                </div>
            </div>
            <div class="panel-body">
                @include('admin.faovs.form')
            </div>
        </div>
    </div>
    
    @section('scripts')		
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/vue-resource.js') }}"></script>
        <script type="text/javascript">
            Vue.http.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';

            window._form = {
                id_user: '',
                update_user: '',
                periodo: '',
                estatus: '',
                pagado_por: '',
                monto: '',
                fecha_pago: ''
            }
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    @endsection
@endsection