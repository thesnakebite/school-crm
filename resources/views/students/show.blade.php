@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles del Alumno</span>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm d-flex align-items-center gap-1">
                        <i class="bi bi-arrow-left"></i>
                        <span>Volver</span>
                    </a>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $student->name }}</dd>

                        <dt class="col-sm-3">Apellidos:</dt>
                        <dd class="col-sm-9">{{ $student->lastname }}</dd>

                        <dt class="col-sm-3">Escuela:</dt>
                        <dd class="col-sm-9">
                            <a href="{{ route('schools.show', $student->school) }}">
                                {{ $student->school->name }}
                            </a>
                        </dd>

                        <dt class="col-sm-3">Fecha de Nacimiento:</dt>
                        <dd class="col-sm-9">{{ date('d/m/Y', strtotime($student->birthdate)) }}</dd>

                        <dt class="col-sm-3">Ciudad Natal:</dt>
                        <dd class="col-sm-9">{{ $student->hometown ?? 'No especificada' }}</dd>

                        <dt class="col-sm-3">Fecha de Registro:</dt>
                        <dd class="col-sm-9">{{ $student->created_at->format('d/m/Y') }}</dd>

                        <dt class="col-sm-3">Última Actualización:</dt>
                        <dd class="col-sm-9">{{ $student->updated_at->format('d/m/Y') }}</dd>
                    </dl>

                    <div class="mt-4 d-flex gap-2">
                        <a 
                          href="{{ route('students.edit', $student) }}" 
                          class="btn btn-warning d-flex align-items-center gap-1"
                        >
                            <i class="bi bi-pencil-square"></i>
                            <span>Editar</span>
                        </a>

                        <form action="{{ route('students.destroy', $student) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button 
                              type="submit" 
                              class="btn btn-danger d-flex align-items-center gap-1" 
                              onclick="return confirm('¿Está seguro de eliminar este alumno?')"
                            >
                                <i class="bi bi-trash2"></i>
                                <span>Eliminar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection