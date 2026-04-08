@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Editar Tpo de activo fijo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.tipos.update', $tipo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre del tipo de activo</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre del tipo de activo @enderror"
                            value="{{ old('nombre', $tipo->nombre) }}"
                        >
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input
                            type="text"
                            id="descripcion"
                            name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            placeholder="@error('descripcion') {{ $message }} @else Ingrese la descripción del tipo de activo @enderror"
                            value="{{ old('descripcion', $tipo->descripcion) }}"
                        >
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Editar tipo de activo
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@stop

