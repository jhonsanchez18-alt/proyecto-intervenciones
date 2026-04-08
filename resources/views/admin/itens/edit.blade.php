@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Editar Repuesto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.itens.update', $iten) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre del Iten</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre del Iten @enderror"
                            value="{{ old('nombre', $iten->nombre) }}"
                        >
                    </div>
                </div>

                <!-- Campo Descripción -->
                
<!-- Campo Categoría -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select
                            id="categoria"
                            name="categoria"
                            class="form-control select2 @error('categoria') is-invalid @enderror"
                        >
                            <option value="">Seleccione una categoría</option>
                            <option value="Aire acondicionado" {{ old('categoria', $iten->categoria) == 'Aire acondicionado' ? 'selected' : '' }}>Aire Acondicionado</option>
                            <option value="Computador" {{ old('categoria', $iten->categoria) == 'Computador' ? 'selected' : '' }}>Computador</option>
                            <option value="Impresora" {{ old('categoria', $iten->categoria) == 'Impresora' ? 'selected' : '' }}>Impresora</option>
                            <option value="VideoBeam" {{ old('categoria', $iten->categoria) == 'VideoBeam' ? 'selected' : '' }}>VideoBeam</option>
                            <option value="Dvr" {{ old('categoria', $iten->categoria) == 'Dvr' ? 'selected' : '' }}>Dvr</option>
                            <option value="Abanico" {{ old('categoria', $iten->categoria) == 'Abanico' ? 'selected' : '' }}>Abanico</option>
                        </select>
                    </div>
                </div>
                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Editar Iten
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@stop

