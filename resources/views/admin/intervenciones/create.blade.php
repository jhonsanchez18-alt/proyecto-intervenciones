@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Añadir Intervencion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="uppercase">{{ $activo->nombre }}</h5> 
        <h5 class="uppercase">{{ $activo->tipo->nombre }}</h5> 
    </div>
    <div class="card-body">

        <form action="{{ route('admin.activos.intervenciones.store', $activo) }}" method="POST">
            @csrf
                    {{-- FILA 1 --}}
            <div class="row">
                <div class="col-md-4">
                    <label>Fecha de intervención</label>
                    <input type="date" name="fecha_intervencion"
                           class="form-control @error('fecha_intervencion') is-invalid @enderror"
                           value="{{ old('fecha_intervencion') }}">
                    @error('fecha_intervencion')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-4">
                    <label>Tipo de intervención</label>
                    <select name="tipo_intervencion"
                            class="form-control @error('tipo_intervencion') is-invalid @enderror">
                        <option value="">Seleccione</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo_intervencion')==$tipo?'selected':'' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipo_intervencion')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-4">
                    <label>Técnico</label>
                    <select name="tecnico_id"
                            class="form-control @error('tecnico_id') is-invalid @enderror">
                        <option value="">Seleccione</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}" {{ old('tecnico_id')==$tecnico->id?'selected':'' }}>
                                {{ $tecnico->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('tecnico_id')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                </div>
            </div>
            <!--REPUESTOS USADOS -->
<p class="pt-2"><strong>Repuestos usados:</strong></p>

<div class="row">
   
    @foreach($repuestos->chunk(ceil($repuestos->count() / 2)) as $chunk)
        <div class="col-md-6">
            @foreach($chunk as $repuesto)
                <div class="form-check">
                    
                    {{-- FALSE por defecto --}}
                    <input type="hidden"
                           name="repuestos[{{ $repuesto->id }}]"
                           value="0">

                    {{-- TRUE si se marca --}}
                    <input class="form-check-input"
                           type="checkbox"
                           name="repuestos[{{ $repuesto->id }}]"
                           value="1"
                           {{ old("repuestos.$repuesto->id") ? 'checked' : '' }}>

                    <label class="form-check-label">
                        {{ $repuesto->nombre }}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
   
</div>
<hr>
<!--Itens realizados en la intervencion -->
<p class="pt-2"><strong>Ítems realizados en la intervención:</strong></p>

<div class="row">
    @foreach($iten_intervenciones->chunk(ceil($iten_intervenciones->count() / 2)) as $chunk)
        <div class="col-md-6">
            @foreach($chunk as $iten)
                <div class="form-check">

                    {{-- FALSE por defecto --}}
                    <input type="hidden"
                           name="iten_intervenciones[{{ $iten->id }}]"
                           value="0">

                    {{-- TRUE si se marca --}}
                    <input class="form-check-input"
                           type="checkbox"
                           name="iten_intervenciones[{{ $iten->id }}]"
                           value="1"
                           {{ old("iten_intervenciones.$iten->id") ? 'checked' : '' }}>

                    <label class="form-check-label">
                        {{ $iten->nombre }}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
            <hr>
            {{-- FILA 2 --}}
            <div class="row mt-2">
                <div class="col-md-6">
                    <label>Quién recibe</label>
                    <input type="text" name="quien_recibe"
                           class="form-control @error('quien_recibe') is-invalid @enderror"
                           value="{{ old('quien_recibe') }}">
                    @error('quien_recibe')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label>Observaciones</label>
                    <input type="text" name="observaciones"
                           class="form-control"
                           value="{{ old('observaciones') }}">
                </div>
            </div>

            {{-- BOTONES --}}
            <div class="text-right mt-3">
                <a href="{{ route('admin.activos.show', $activo) }}" class="btn btn-secondary">
                    Cancelar
                </a>
                <button class="btn btn-primary">
                    Guardar intervención
                </button>
            </div>

        </form>

    </div>
</div>
@stop

