@extends('layouts.index')
	@section('content')
		<div class="container mt-3">
			@if (session('success'))
				<div class="alert alert-success" role="alert">
	  				{{ session('success') }}	
				</div>
			@endif
			@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<p><strong>!Opp tenemos un problema</strong></p>
				<ul>
					@foreach ($errors->all() as $elem)
						<li>{{ $elem }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="row">
				<div class="col-md-12">
					<div><h3>Pacientes</h3></div>
					<div class="table-responsive">
						<table class="table table-light table-bordered table-hover">
				   			<thead>
							    <tr class="table-light">
							    	<th colspan="1" class="table-light">Nombre</th>
							    	<th colspan="1" class="table-light">Email</th>
							    	<th colspan="1" class="table-light">Documento</th>
							    	<th colspan="1" class="table-light">Fecha nacimiento</th>
							    	<th colspan="2" class="table-light">Acciones</th>
							    </tr>
						  	</thead>
						  	<tbody>
						  	@foreach ($pacientes as $elem)
						    	<tr class="table-light">
							  		<td class="table-light">{{ $elem->nombre }}</td>
							  		<td class="table-light">{{ $elem->email }}</td>
							  		<td class="table-light">{{ $elem->documento }}</td>
							  		<td class="table-light">{{ $elem->fecha_nacimiento }}</td>
							  		<td class="table-light flex">
							  			@auth
								    	<span>
								    		<a href="{{ route('pacientes.edit', $elem->id) }}" class="btn btn-primary">Editar</a>
								    	</span>
								    	<span>
								    		<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $elem->id }}">Eliminar</button>
								    	</span>
							  			@endauth
							  			@guest
							  				<p>
							  					<a href="/login">Inicia sesión</a> para realizar accciones.
							  				</p>
							  			@endguest
							    	</td>
						    	</tr>
								<!-- Modal -->
								<div class="modal fade" id="deletemodal{{ $elem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
								        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								  			</div>
										    <div class="modal-body">
										        ¿Estás seguro de eliminar a {{ $elem->nombre }}?
										    </div>
								  			<div class="modal-footer">
								  				<form action="{{ route('pacientes.destroy', $elem->id) }}" method="POST">
								  					@csrf
								  					@method('DELETE')
									        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
									        		<button type="submit" class="btn btn-danger">Eliminar</button>
								  				</form>
											</div>
										</div>
									</div>
								</div>
						  	@endforeach
							</tbody>						    
				   		</table>
					</div>
			    </div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-5">
			    	<div><h3>Crear nuevo paciente</h3></div>
					@auth
					<form class="row mt-2 gy-3" action="{{ route('pacientes.store') }}" method="POST">
						@csrf
						<div class="col-sm-6">
							<label for="name" class="form-label"><b>Nombre</b></label>
							<input type="text" class="form-control" id="name" name="nombre" required placeholder="Nombre del paciente">
						</div>
						<div class="col-sm-6">
							<label for="email" class="form-label"><b>Correo</b></label>
							<input type="email" class="form-control" id="email" name="email" required placeholder="alguien@example.com">
						</div>
						<div class="col-sm-5">
							<label for="document" class="form-label"><b>Documento</b></label>
							<input type="number"  required class="form-control" id="document" name="documento" placeholder="Documento">
						</div>
						<div class="col-sm-7">
							<label for="fecha_nacimiento" class="form-label"><b>Fecha de nacimiento</b></label>
							<input type="date" required class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
						</div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-success">
							Crear
							</button>
							<button type="reset" class="btn btn-secondary">Limpiar campos</button>
						</div>
					</form>
					@endauth
					@guest
						<p><a href="/login">Inicia sesión</a> para crear un nuevo usuario.</p>
					@endguest
			    </div>
			    <div class="col-md-6">
			    	<div><h3>--</h3></div>
			    </div>
			</div>
		</div>
	@endsection