@extends('layouts.dashboard')

@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Nuevo Entrenador</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/entrenadores') }}" class="btn btn-sm btn-info">
               <i class="fas fa-chevron-left"></i> Regresar</a>
          </div>
        </div>
      </div>
      <div class="card-body">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    <strong>Error</strong>: {{ $error }}
                  </div>         
            @endforeach
        @endif
        <form action="{{ url('/entrenadores') }}" method="POST">
            @csrf
             <div class="form-group">
               <label for="name">Nombre del Entrenador</label> 
               <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
             </div>

             <div class="form-group">
                <label for="Apellido">Apellido</label> 
                <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="email">Correo Electronico</label> 
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="FechaNac">FechaNac</label> 
                <input type="date" name="FechaNac" value="{{ old('FechaNac') }}" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control"
                    value="{{ old('password', Str::random(8)) }}">
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Crear Entrenador</button>
        </form>
      </div>
    </div>
  </div>
@endsection
