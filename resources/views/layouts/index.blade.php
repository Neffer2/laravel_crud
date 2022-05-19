<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title></title>
</head> 
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #0d6efd;">
	<div class="container-fluid">
    	<a class="navbar-brand" href="/">
    		<img src="{{URL::asset('/img/logo-st.png')}}" height="40" class="d-inline-block align-top" alt="">
    	</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      	<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="/pacientes">Pacientes</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" href="/medicos">Medicos</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" href="/citas">Citas</a>
		        </li>
		        <li class="nav-item">
		        	<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Cuenta</button>
		        </li>
			</ul>
		</div>
	</div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header">
			<h5 id="offcanvasRightLabel">Cuenta</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			@guest
				<a class="btn btn-primary" href="/login">Iniciar sesión</a>
			@endguest
			@auth
				<a class="btn btn-danger" href="/logout">Cerrar sesión</a>
			@endauth
			@guest
          		<a class="btn btn-info" href="/register">Registrarse</a>
			@endguest
		</div>
</div>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>