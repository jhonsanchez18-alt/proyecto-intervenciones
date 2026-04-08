@extends('adminlte::page')
@section('title', 'IafCSF')
@section('content_header')
<h1>Editar Activo</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">

        <!-- Inicio formulario -->
        <form action="{{ route('admin.activos.update', $activo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- Fila 1 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nommbre</label>
                        <input type="text" name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre', $activo->nombre) }}">
                        @error('nombre')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="categoria_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $activo->categoria_id)==$categoria->id?'selected':'' }}>
                                {{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="tipo_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ old('tipo_id', $activo->tipo_id)==$tipo->id?'selected':'' }}>
                                {{ $tipo->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{--Fila 2--}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            value="{{ old('descripcion', $activo->descripcion) }}">
                        @error('descripcion')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sección</label>
                        <select name="seccion_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($secciones as $seccion)
                            <option value="{{ $seccion->id }}" {{ old('seccion_id', $activo->seccion_id)==$seccion->id?'selected':'' }}>
                                {{ $seccion->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Ubicación</label>
                        <select name="ubicacion_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->id }}" {{ old('ubicacion_id', $activo->ubicacion_id)==$ubicacion->id?'selected':'' }}>
                                {{ $ubicacion->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

                



                {{-- FILA 3 --}}
                <div class="row">
                    <div class="col-md-3">
                        <label>Marca</label>
                        <select name="marca_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id', $activo->marca_id)==$marca->id?'selected':'' }}>
                                {{ $marca->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Modelo</label>
                        <input type="text" name="modelo"
                            class="form-control @error('modelo') is-invalid @enderror"
                            value="{{ old('modelo', $activo->modelo) }}">
                    </div>
                    <div class="col-md-3">
                        <label>N° Serie</label>
                        <input type="text" name="numerodeserie"
                            class="form-control @error('numerodeserie') is-invalid @enderror"
                            value="{{ old('numerodeserie', $activo->numerodeserie) }}">
                    </div>
                    <div class="col-md-3">
                        <label>Fecha de Compra</label>
                        <input type="date" name="fechacompra"
                            class="form-control @error('fechacompra') is-invalid @enderror"
                            value="{{ old('fechacompra', \Carbon\Carbon::parse($activo->fechacompra)->format('Y-m-d')) }}">

                    </div>
                </div>
            
            {{--Fila 4--}}
            <div class="row mt-2">
                <div class="col-md-3">
                    <label>Valor Compra</label>
                    <input type="number" step="0.01" name="valorcompra"
                        class="form-control @error('valorcompra') is-invalid @enderror"
                        value="{{ old('valorcompra', $activo->valorcompra) }}">
                </div>
                <div class="col-md-3">
                    <label>Estado</label>
                    <select name="estado_id" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ old('estado_id', $activo->estado_id)==$estado->id?'selected':'' }}>
                            {{ $estado->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Responsable</label>
                    <select name"responsable_id" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach($responsable as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id', $activo->responsable_id)==$responsable->id?'selected':'' }}>
                            {{ $responsable->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Identificador Único</label>
                    <input type="text" name="identificadorunico"
                        class="form-control @error('identificadorunico') is-invalid @enderror"
                        value="{{ old('identificadorunico', $activo->identificadorunico) }}">
                </div>
            </div>

            {{-- OBSERVACIONES --}}
            <div class="form-group mt-2">
                <label>Observaciones</label>
                <textarea name="observaciones" class="form-control @error('observaciones') is-invalid @enderror">{{ old('observaciones', $activo->observaciones) }}</textarea>

            </div>
    

            {{-- BOTONES --}}
            <div class="text-right mt-3">
                <a href="{{ route('admin.activos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button class="btn btn-primary">Actualizar Activo</button>
            </div>
        </form>
    </div>
</div>



@endsection