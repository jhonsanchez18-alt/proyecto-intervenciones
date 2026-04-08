@extends('adminlte::page')

@section('title', 'Crear Activo Fijo')

@section('content_header')
<h1>Crear Activo Fijo</h1>
@stop

@section('content')
<div class="card">
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
        <form action="{{ route('admin.activos.store') }}" method="POST">
            @csrf

            {{-- FILA 1 --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') }}">
                        @error('nombre')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="categoria_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id')==$categoria->id?'selected':'' }}>
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
                            <option value="{{ $tipo->id }}" {{ old('tipo_id')==$tipo->id?'selected':'' }}>
                                {{ $tipo->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- FILA 2 --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text"
                            name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            value="{{ old('descripcion') }}"
                            placeholder="Descripción del activo">

                        @error('descripcion')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sección</label>
                        <select name="seccion_id" class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach($secciones as $seccion)
                            <option value="{{ $seccion->id }}" {{ old('seccion_id')==$seccion->id?'selected':'' }}>
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
                            <option value="{{ $ubicacion->id }}" {{ old('ubicacion_id')==$ubicacion->id?'selected':'' }}>
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
                        <option value="{{ $marca->id }}" {{ old('marca_id')==$marca->id?'selected':'' }}>
                            {{ $marca->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}">
                </div>

                <div class="col-md-3">
                    <label>N° Serie</label>
                    <input type="text" name="numerodeserie" class="form-control" value="{{ old('numerodeserie') }}">
                </div>

                <div class="col-md-3">
                    <label>Fecha Compra</label>
                    <input type="date" name="fechacompra" class="form-control" value="{{ old('fechacompra') }}">
                </div>
            </div>

            {{-- FILA 4 --}}
            <div class="row mt-2">
                <div class="col-md-3">
                    <label>Valor Compra</label>
                    <input type="number" step="0.01" name="valorcompra" class="form-control" value="{{ old('valorcompra') }}">
                </div>

                <div class="col-md-3">
                    <label>Estado</label>
                    <select name="estado_id" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ old('estado_id')==$estado->id?'selected':'' }}>
                            {{ $estado->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Responsable</label>
                    <select name="responsable_id" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach($responsable as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_id')==$responsable->id?'selected':'' }}>
                            {{ $responsable->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Identificador Único</label>
                    <input type="text" name="identificadorunico" class="form-control" value="{{ old('identificadorunico') }}">
                </div>
            </div>

            {{-- OBSERVACIONES --}}
            <div class="form-group mt-2">
                <label>Observaciones</label>
                <textarea name="observaciones" class="form-control">{{ old('observaciones') }}</textarea>
            </div>

            {{-- BOTONES --}}
            <div class="text-right mt-3">
                <a href="{{ route('admin.activos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button class="btn btn-primary">Guardar Activo</button>
            </div>

        </form>

    </div>
</div>
@stop