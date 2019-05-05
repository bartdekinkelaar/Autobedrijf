<div class="nietresponsive col-md-12">
	<div class="header">
		<a href="{{ url('/') }}">
			<img src="{{ url('/img/Normaal_logoV31.png') }}" class="logo"/>
		</a>
		<ul class="menu">
	    	<li>
	    		<a href="{{ url('/') }}">HOME</a>
	    	</li>
	    	<li>
	    		<a href="{{ route('cars.index') }}">OCCASIONS</a>
	    	</li>
	    	<li>
	    		<a href="{{ route('service') }}">DIENSTEN</a>
	    	</li>
	    	<li>
	    		<a href="{{ route('aboutUs') }}">OVER ONS</a>
	    	</li>
	    	<li>
		    	<a href="{{ route('contact') }}">CONTACT</a>
		    </li>
		</ul>
	</div>
</div>
<div class="responsive col-md-12">
	<nav class="navbar navbar-expand-lg navbar-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	    <a class="navbar-brand" href="{{ url('/') }}">
			<img src="./img/Normaal_logoV31.png" class="logores"/>
		</a>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('cars.index') }}">OCCASIONS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('aboutUs') }}">OVER ONS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('service') }}">DIENSTEN</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
				</li>
			</ul>
		</div>
	</nav>
</div>