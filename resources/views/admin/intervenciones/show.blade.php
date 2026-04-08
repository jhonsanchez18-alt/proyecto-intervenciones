@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
<h1>Detalle de Intervención</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="uppercase">{{ $intervencione->activo->nombre }}</h5>
    </div>

    <div class="card-body">

        <table class="table table-borderless table-sm">
            <tr>
                <td class="w-33">
                    <p><strong>Sección:</strong> {{ $intervencione->activo->seccion->nombre }} </p>
                </td>
                <td class="w-33">
                    <p><strong>Ubicación:</strong> {{ $intervencione->activo->ubicacion->nombre}}</p>
                </td>
                <td class="w-33">
                    <p><strong>Categoría:</strong> {{ $intervencione->activo->categoria->nombre }}</p>
                </td>

            </tr>
        </table>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="uppercase">Detalles de la Intervención</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <label>Fecha de intervención</label>
                        <p> {{ \Carbon\Carbon::parse($intervencione->fecha_intervencion)->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Tipo de intervención</label>
                        <p>{{ $intervencione->tipo_intervencion }}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Técnico Responsable</label>
                        <p>{{ $intervencione->tecnico->nombre }}</p>
                    </div>
                </div>

                <hr>

                <!-- Repuestos usados -->
                <p><strong>Repuestos usados:</strong></p>
                @if($intervencione->repuestos->isEmpty())
                <p>No hay repuestos asociados.</p>
                @else

                @php
                // Dividir repuestos en 2 columnas iguales
                $chunk = ceil($intervencione->repuestos->count() / 2);
                $columnas = $intervencione->repuestos->chunk($chunk);
                @endphp

                <div class="row">
                    @foreach($columnas as $columna)
                    <div class="col-md-6">
                        @foreach($columna as $repuesto)
                        <div class="form-check mb-1">
                            <input class="form-check-input"
                                type="checkbox"
                                disabled
                                {{ $repuesto->pivot->estado ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $repuesto->nombre }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                @endif
                <hr>
                <p><strong>Itens realizados en la intervención:</strong></p>
                @if($intervencione->itenaires->isEmpty())
                <p>No hay ítems asociados.</p>
                @else

                @php
                // Dividir los ítems en 2 columnas iguales
                $chunk = ceil($intervencione->itenaires->count() / 2);
                $columnas = $intervencione->itenaires->chunk($chunk);
                @endphp

                <div class="row">
                    @foreach($columnas as $columna)
                    <div class="col-md-6">
                        @foreach($columna as $iten)
                        <div class="form-check mb-1">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                disabled
                                {{ $iten->pivot->estado ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $iten->nombre }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label>Quién recibe</label>
                        <p>{{ $intervencione->quien_recibe }}</p>
                    </div>

                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <p>{{ $intervencione->observaciones }}</p>
                    </div>
                </div>
            </div>

            @endif
        </div>

        {{-- FOOTER --}}
    <div class="card-footer text-right">
        <a
            href="{{ route('admin.activos.show', $intervencione->activo) }}"
            class="btn btn-secondary">
            Volver al activo
        </a>

     <a href="{{ route('admin.activos.intervenciones.edit', [
    $intervencione->activo,
    $intervencione
]) }}" class="btn btn-primary">
    Editar intervención
</a>
    </div>


    </div>
</div>


@stop