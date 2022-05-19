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
	    		<h5 class="card-title">Editar cita</h5>
					<form class="row mt-2 gy-3" action="{{ route('citas.update', $cita->id) }}" method="POST">
					@csrf
					@method('PATCH')
					<div class="col-sm-6">
						<label for="medico" class="form-label"><b>Médico</b></label>
						<select id="medico" name="medico_id" class="form-select" required>
							@foreach ($medicos as $elem)
								@if ($cita->medico_id == $elem->id)
									<option selected value="{{ $elem->id }}">{{ $elem->nombre }}</option>
								@else
									<option value="{{ $elem->id }}">{{ $elem->nombre }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="col-sm-6">
						<label for="paciente" class="form-label"><b>Pacientes</b></label>
						<select id="paciente" name="paciente_id" class="form-select" required>
							@foreach ($pacientes as $elem)
								@if ($cita->paciente_id == $elem->id)
									<option selected value="{{ $elem->id }}">{{ $elem->nombre }}</option>
								@else
									<option value="{{ $elem->id }}">{{ $elem->nombre }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="col-sm-6">
						<label for="motivo" class="form-label"><b>Motivo</b></label>
						<textarea class="form-control" id="motivo" rows="3" placeholder="Motivo de la cita" name="motivo" required >{{ $cita->motivo }}</textarea>
					</div>
					<div class="col-sm-6">
						<label for="fecha" class="form-label"><b>Fecha</b></label>
						<input type="date" class="form-control" id="fecha" name="fecha_cita" required value="{{ $cita->fecha_cita }}">
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-success">
						Crear
						</button>
						<button type="reset" class="btn btn-secondary">Limpiar campos</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection