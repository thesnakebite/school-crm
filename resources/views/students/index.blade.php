@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de Alumnos</span>
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                        <i class="bi bi-plus-lg"></i>
                        <span>Nuevo Alumno</span>
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Escuela</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Ciudad Natal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>
                                            <a href="{{ route('schools.show', $student->school) }}">
                                                {{ $student->school->name }}
                                            </a>
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($student->birthdate)) }}</td>
                                        <td>{{ $student->hometown ?? 'No especificada' }}</td>
                                        <td>
                                            <div class="btn-group gap-2" role="group">
                                                <a href="{{ route('students.show', $student) }}" style="text-decoration: none">
                                                    <button class="btn btn-info btn-sm d-flex align-items-center gap-1">
                                                        <i class="bi bi-eyeglasses"></i>
                                                        <span>Ver</span>
                                                    </button>
                                                </a>
                                                <a href="{{ route('students.edit', $student) }}" style="text-decoration: none">
                                                    <button class="btn btn-warning btn-sm d-flex align-items-center roun gap-1">
                                                        <i class="bi bi-pencil-square"></i>
                                                        <span>Editar</span>
                                                    </button>
                                                </a>
                                                <form 
                                                  action="{{ route('students.destroy', $student) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button 
                                                      type="submit" 
                                                      class="btn btn-danger btn-sm" 
                                                      onclick="return confirm('¿Está seguro de eliminar este alumno?')"
                                                    >
                                                        <i class="bi bi-trash2"></i>
                                                        <span>Eliminar</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No hay alumnos registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection