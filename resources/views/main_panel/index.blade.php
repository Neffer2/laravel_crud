@extends('layouts.index')
	@section('content')  
		<div class="container mt-3">
			@if (session('success'))
				<div class="alert alert-success"><p>Bienvenido {{ session('success') }}</p></div>
			@endif
			<div class="row">
				<div class="col-md-6">
					<div><h3>Pacientes</h3></div>
					<div class="table-responsive">
						<table class="table table-light table-bordered table-hover">
				   			<thead>
							    <tr class="table-light">
							    	<th colspan="1" class="table-light">Nombre</th>
							    	<th colspan="1" class="table-light">Email</th>
							    	<th colspan="1" class="table-light">Documento</th>
							    	<th colspan="1" class="table-light">Nacimiento</th>
							    </tr>
						  	</thead>
						  	<tbody>
						  	@foreach ($pacientes as $elem)
						    	<tr class="table-light">
							  		<td class="table-light">{{ $elem->nombre }}</td>
							  		<td class="table-light">{{ $elem->email }}</td>
							  		<td class="table-light">{{ $elem->documento }}</td>
							  		<td class="table-light">{{ $elem->fecha_nacimiento }}</td>
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
			    <div class="col-md-6">
			    	<div><h3>Médicos</h3></div>
			    	<div class="table-responsive">
						<table class="table table-light table-bordered table-hover">
				   			<thead>
							    <tr class="table-light">
							    	<th colspan="1" class="table-light">Nombre</th>
							    	<th colspan="1" class="table-light">Documento</th>
							    	<th colspan="1" class="table-light">Especialidad</th>
							    	<th colspan="1" class="table-light">Experienia</th>
							    </tr>
						  	</thead>
						  	<tbody>
						  	@foreach ($medicos as $elem)
						    	<tr class="table-light">
							  		<td class="table-light">{{ $elem->nombre }}</td>
							  		<td class="table-light">{{ $elem->documento }}</td>
							  		<td class="table-light">{{ $elem->especialidad }}</td>
							  		<td class="table-light">{{ $elem->experiencia }}</td>
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
								  				<form action="{{ route('medicos.destroy', $elem->id) }}" method="POST">
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
			    <hr>
			    <div class="col-md-12">
			    	<div><h3>Citas</h3></div>
			    	<div class="table-responsive">
				    	<table class="table table-hover">
				   			<thead>
							    <tr>
							    	<th>Médico</th>
							    	<th>Paciente</th>
							    	<th>Fecha</th>
							    	<th>Motivo</th>
							    </tr>
						  	</thead>
						  	<tbody>
						  		@foreach ($citas as $elem)
						  			<tr>
						  				<td>{{ $elem->medico->nombre }}</td>
						  				<td>{{ $elem->paciente->nombre }}</td>
						  				<td>{{ $elem->fecha_cita }}</td>
						  				<td>{{ $elem->motivo }}</td>
						  			</tr>
						  		@endforeach
							</tbody>						    
				   		</table>
			    	</div>
			    </div>
			</div>
		</div>
	@endsection