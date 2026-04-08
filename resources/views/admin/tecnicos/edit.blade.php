@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Editar tecnico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.tecnicos.update', $tecnico) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre del técnico</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre del técnico @enderror"
                            value="{{ old('nombre', $tecnico->nombre) }}"
                        >
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="especialidad">Especialidad</label>
                        <input
                            type="text"
                            id="especialidad"
                            name="especialidad"
                            class="form-control @error('especialidad') is-invalid @enderror"
                            placeholder="@error('especialidad') {{ $message }} @else Ingrese la especialidad del técnico @enderror"
                            value="{{ old('especialidad', $tecnico->especialidad) }}"
                        >
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Editar Tecnico
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@stop

