@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Crear Nueva Escuela</span>
                    <a href="{{ route('schools.index') }}" class="btn btn-secondary btn-sm">Volver</a>
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

                    <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input 
                              type="text" 
                              class="form-control 
                              @error('name') is-invalid @enderror" 
                              id="name" 
                              name="name" 
                              value="{{ old('name') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input
                              type="text"
                              class="form-control @error('address') is-invalid @enderror"
                              id="address"
                              name="address"
                              value="{{ old('address') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input
                              type="file"
                              class="form-control @error('logo') is-invalid @enderror"
                              id="logo"
                              name="logo"
                              accept="image/*"
                            >
                            <small class="text-muted">El logo debe tener un tamaño mínimo de 200x200px y no superar los 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control @error('email') is-invalid @enderror"
                              id="email"
                              name="email"
                              value="{{ old('email') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input
                              type="text"
                              class="form-control @error('phone') is-invalid @enderror"
                              id="phone"
                              name="phone"
                              value="{{ old('phone') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Página Web</label>
                            <input 
                              type="url" 
                              class="form-control 
                              @error('website') is-invalid @enderror" 
                              id="website" name="website" value="{{ old('website') }}"
                              placeholder="https://ejemplo.com"
                            />
                        </div>

                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                            <i class="bi bi-save"></i>
                            <span>Crear Escuela</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection