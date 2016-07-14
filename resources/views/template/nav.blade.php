
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  	@if (Auth::guest())
	@else		
		<li><a href="/logout">Logout</a></li>			
	@endif
</ul>
<ul id="dropdown2" class="dropdown-content">
  	@if (Auth::guest())
	@else		
		<li><a href="/logout">Logout</a></li>			
	@endif
</ul>
<nav>
  	<div class="nav-wrapper cyan">
      	<a href="/" class="brand-logo">App Notes</a>
      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
  		<ul class="right hide-on-med-and-down">
	        @if (Auth::guest())
			@else
				@if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
					<li><a href="{{ route('users.index') }}">Usuarios</a></li>
				@endif
			@endif
	      	@if (Auth::guest())
				<li><a href="{{ route('login') }}">Iniciar sesión</a></li>
				<li><a href="{{ route('register') }}">Registrar</a></li>
			@else
				<!-- Dropdown Trigger -->
		      	<li>
		      		<a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a>
		      	</li>
			@endif	   
  		</ul>
  		<ul class="side-nav" id="mobile-demo">
	        @if (Auth::guest())
			@else
				@if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
					<li><a href="{{ route('users.index') }}">Usuarios</a></li>
				@endif
			@endif
	      	@if (Auth::guest())
				<li><a href="{{ route('login') }}">Iniciar sesión</a></li>
				<li><a href="{{ route('register') }}">Registrar</a></li>
			@else
				<!-- Dropdown Trigger -->
		      	<li>
		      		<a class="dropdown-button" href="#!" data-activates="dropdown2">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a>
		      	</li>
			@endif	   
  		</ul>
    </div>
</nav>