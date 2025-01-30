@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Crear Nuevo Alumno</span>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm d-flex align-items-center gap-1">
                        <i class="bi bi-arrow-left"></i>
                        <span>Volver</span>
                    </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" 
                                   class="form-control @error('lastname') is-invalid @enderror" 
                                   id="lastname" 
                                   name="lastname" 
                                   value="{{ old('lastname') }}">
                        </div>

                        <div class="mb-3">
                            <label for="school_id" class="form-label">Escuela</label>
                            <select class="form-select @error('school_id') is-invalid @enderror" 
                                    id="school_id" 
                                    name="school_id">
                                <option value="">Seleccione una escuela</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}" 
                                            {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                        {{ $school->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" 
                                   class="form-control @error('birthdate') is-invalid @enderror" 
                                   id="birthdate" 
                                   name="birthdate" 
                                   value="{{ old('birthdate') }}">
                        </div>

                        <div class="mb-3">
                            <label for="hometown" class="form-label">Ciudad Natal</label>
                            <input type="text" 
                                   class="form-control @error('hometown') is-invalid @enderror" 
                                   id="hometown" 
                                   name="hometown" 
                                   value="{{ old('hometown') }}">
                        </div>

                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                            <i class="bi bi-save"></i>
                            <span>Guardar Alumno</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection