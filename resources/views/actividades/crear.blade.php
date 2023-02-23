<?php
   use Illuminate\Support\Str;
?>
@extends('layouts.dashboard')

@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Nueva Actividad</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/actividades') }}" class="btn btn-sm btn-info">
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
        <form action="{{ url('/actividades') }}" method="POST">
            @csrf
             <div class="form-group">
               <label for="name">Nombre de Actividad</label> 
               <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
             </div>

             <div class="form-group">
                <label for="descripcion">Descripcion</label> 
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control">
              </div>

              <div class="form-group">
                <label for="horario">Horario</label> 
                <input type="time" name="horario" value="{{ old('horario') }}" class="form-control">
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Crear Actividad</button>
        </form>
      </div>
    </div>
  </div>
@endsection
