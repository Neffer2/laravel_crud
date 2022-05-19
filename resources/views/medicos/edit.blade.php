@extends('layouts.index')
	@section('content')
	<div class="container mt-2">
		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<p>!Opps tenemos un problema</p>
				<ul>
					@foreach ($errors->all() as $elem)
						<li>{{ $elem }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="card">
	  		<div class="card-body">
	    		<h5 class="card-title">Editar medicos</h5>
					<form class="row mt-3 gy-3" action="{{ route('medicos.update', $medico->id) }}" method="POST">
						@csrf
						@method('PATCH')
						<div class="col-sm-6">
							<label for="name" class="form-label"><b>Nombre</b></label>
							<input type="text" class="form-control" id="name" name="nombre" required placeholder="Nombre del paciente" value="{{ $medico->nombre }}">
						</div>
						<div class="col-sm-5">
							<label for="document" class="form-label"><b>Documento</b></label>
							<input type="number"  required class="form-control" id="document" name="documento" placeholder="Documento" value="{{ $medico->documento }}">
						</div>
						<div class="col-sm-6">
							<label for="email" class="form-label"><b>Especialidad</b></label>
							<input type="text" class="form-control" id="especialidad" name="especialidad" required placeholder="Especialidad" value="{{ $medico->especialidad}}">
						</div>
						<div class="col-sm-6">
							<label for="fecha_nacimiento" class="form-label"><b>Experiencia</b></label>
							<input type="number" required class="form-control" id="experiencia" name="experiencia" value="{{ $medico->experiencia }}">
						</div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-success">
							Guardar cambios
							</button>
							<button type="reset" class="btn btn-secondary">Cancelar</button>
						</div>
					</form>
			</div>
		</div>
	</div>
	@endsection