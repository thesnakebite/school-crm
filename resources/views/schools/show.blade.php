@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles de la Escuela</span>
                    <a href="{{ route('schools.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($school->logo)
                            <img src="{{ $school->logo }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
                        @else
                            <p>Sin logo</p>
                        @endif
                    </div>

                    <dl class="row">
                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $school->name }}</dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9">{{ $school->address }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $school->email ?? 'No especificado' }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $school->phone ?? 'No especificado' }}</dd>

                        <dt class="col-sm-3">Página Web:</dt>
                        <dd class="col-sm-9">
                            @if($school->website)
                                <a href="{{ $school->website }}" target="_blank">{{ $school->website }}</a>
                            @else
                                No especificada
                            @endif
                        </dd>
                    </dl>

                    <div class="mt-4">
                        <h5>Estudiantes de esta escuela</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Fecha de Nacimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($school->students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ date('d/m/Y', strtotime($student->birthdate)) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No hay estudiantes registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection