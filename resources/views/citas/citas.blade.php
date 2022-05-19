@extends('layouts.index')
	@section('content')
	<div class="container">
		@if (session('success'))
			<div class="alert alert-success" role="alert">
				{{ session('success') }}
			</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<p>!Opps, tenemos un problema</p>
				<ul>
					@foreach ($errors->all() as $elem)
						<li>{{ $elem }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div>
					<h3>
						<b>Citas</b>
					</h3>
				</div>
				<div class="table-responsive">
					<table class="table table-light table-bordered table-hover">
			   			<thead>
						    <tr class="table-light">
						    	<th colspan="1" class="table-light">Médico</th>
						    	<th colspan="1" class="table-light">Paciente</th>
						    	<th colspan="1" class="table-light">Motivo</th>
						    	<th colspan="1" class="table-light">Fecha</th>
						    	<th colspan="2" class="table-light">Acciones</th>
						    </tr>
					  	</thead>
					  	<tbody> 
					  	@foreach ($citas as $elem)
					    	<tr class="table-light">
						  		<td class="table-light">{{ $elem->medico->nombre }}</td>
						  		<td class="table-light">{{ $elem->paciente->nombre }}</td>
						  		<td class="table-light">{{ $elem->motivo }}</td>
						  		<td class="table-light">{{ $elem->fecha_cita }}</td>
						  		<td class="table-light flex">
						  			@auth
							    	<span>
							    		<a href="{{ route('citas.edit', $elem->id) }}" class="btn btn-primary">Editar</a>
							    	</span>
							    	<span>
							    		<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $elem->id }}">Eliminar</button>
							    	</span>
						  			@endauth
						  			@guest
						  				<p><a href="/login">Inicia sesión</a> para realizar acciones.</p>
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
									        ¿Estás seguro de eliminar la cita del médico {{ $elem->medico->nombre }}?
									    </div>
							  			<div class="modal-footer">
							  				<form action="{{ route('citas.destroy', $elem->id) }}" method="POST">
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
		    	<div><h3><b>Nueva cita</b></h3></div>
				@auth
				<form class="row mt-2 gy-3" action="{{ route('citas.store') }}" method="POST">
					@csrf
					<div class="col-sm-6">
						<label for="medico" class="form-label"><b>Médico</b></label>
						<select id="medico" name="medico_id" class="form-select" required>
							@foreach ($medicos as $elem)
								<option value="{{ $elem->id }}">{{ $elem->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-6">
						<label for="paciente" class="form-label"><b>Pacientes</b></label>
						<select id="paciente" name="paciente_id" class="form-select" required>
							@foreach ($pacientes as $elem)
								<option value="{{ $elem->id }}">{{ $elem->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-6">
						<label for="motivo" class="form-label"><b>Motivo</b></label>
						<textarea class="form-control" id="motivo" rows="3" placeholder="Motivo de la cita" name="motivo" required></textarea>
					</div>
					<div class="col-sm-6">
						<label for="fecha" class="form-label"><b>Fecha</b></label>
						<input type="date" class="form-control" id="fecha" name="fecha_cita" required>
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
					<p><a href="/login">Inicia sesión</a> para crear una cita nueva.</p>
				@endguest
		    </div>
		    <div class="col-md-6">
		    	<div><h3>--</h3></div>
		    </div>
		</div>
	</div>
	@endsection