@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de Escuelas</span>
                    <a href="{{ route('schools.create') }}" class="btn btn-primary btn-sm">Nueva Escuela</a>
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
                                    <th>Logo</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td>
                                            @if($school->logo)
                                                <img src="{{ $school->logo }}" alt="Logo" width="50">
                                            @else
                                                Sin logo
                                            @endif
                                        </td>
                                        <td>{{ $school->name }}</td>
                                        <td>{{ $school->address }}</td>
                                        <td>{{ $school->email }}</td>
                                        <td>{{ $school->phone }}</td>
                                        <td>
                                            <div class="btn-group gap-2" role="group">
                                                <a href="{{ route('schools.show', $school) }}" style="text-decoration: none">
                                                    <button class="btn btn-info btn-sm d-flex align-items-center gap-1">
                                                        <i class="bi bi-eyeglasses"></i>
                                                        <span>Ver</span>
                                                    </button>
                                                </a>
                                                
                                                <a href="{{ route('schools.edit', $school) }}" style="text-decoration: none">
                                                    <button class="btn btn-warning btn-sm d-flex align-items-center roun gap-1">
                                                        <i class="bi bi-pencil-square"></i>
                                                        <span>Editar</span>
                                                    </button>
                                                </a>
                                                
                                                <form action="{{ route('schools.destroy', $school) }}" method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm d-flex align-items-center gap-1" 
                                                            onclick="return confirm('¿Está seguro?')">
                                                        <i class="bi bi-trash2"></i>
                                                        <span>Eliminar</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $schools->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection