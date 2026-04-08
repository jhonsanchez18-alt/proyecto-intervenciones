    @extends('adminlte::page')

    @section('title','Editar Intervención')

    @section('content_header')
    <h1>Editar Intervención</h1>
    @stop

    @section('content')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="uppercase">Editar intervención de {{ $activo->nombre }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.intervenciones.update', $intervencione->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
        <label>Fecha de intervención</label>
        <input type="date"
            name="fecha_intervencion"
            value="{{ old('fecha_intervencion', \Carbon\Carbon::parse($intervencione->fecha_intervencion)->format('Y-m-d')) }}"
            class="form-control">
    </div>

                    <div class="col-md-4">
                        <label>Tipo de intervención</label>
                        <select name="tipo_intervencion" class="form-control">
                            @foreach($tipos as $tipo)
                            <option value="{{ $tipo }}" {{ $intervencione->tipo_intervencion == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Técnico</label>
                        <select name="tecnico_id" class="form-control">
                            @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}" {{ $intervencione->tecnico_id == $tecnico->id ? 'selected' : '' }}>{{ $tecnico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>

                <p><strong>Repuestos usados:</strong></p>
                <div class="row">
                    @foreach($repuestos->chunk(ceil($repuestos->count() / 2)) as $chunk)
                    <div class="col-md-6">
                        @foreach($chunk as $repuesto)
                        @php
                        $checked = $intervencione->repuestos->contains($repuesto->id) && $intervencione->repuestos->find($repuesto->id)->pivot->estado;
                        @endphp
                        <div class="form-check">
                            <input type="hidden" name="repuestos[{{ $repuesto->id }}]" value="0">
                            <input class="form-check-input" type="checkbox" name="repuestos[{{ $repuesto->id }}]" value="1" {{ $checked ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $repuesto->nombre }}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                <hr>

                <p><strong>Ítems realizados:</strong></p>
                <div class="row">
                    @foreach($iten_intervenciones->chunk(ceil($iten_intervenciones->count() / 2)) as $chunk)
                    <div class="col-md-6">
                        @foreach($chunk as $iten)
                        @php
                        $checked = $intervencione->itenaires->contains($iten->id) && $intervencione->itenaires->find($iten->id)->pivot->estado;
                        @endphp
                        <div class="form-check">
                            <input type="hidden" name="iten_intervenciones[{{ $iten->id }}]" value="0">
                            <input class="form-check-input" type="checkbox" name="iten_intervenciones[{{ $iten->id }}]" value="1" {{ $checked ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $iten->nombre }}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                <hr>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label>Quién recibe</label>
                        <input type="text" name="quien_recibe" class="form-control" value="{{ old('quien_recibe', $intervencione->quien_recibe) }}">
                    </div>

                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <input type="text" name="observaciones" class="form-control" value="{{ old('observaciones', $intervencione->observaciones) }}">
                    </div>
                </div>

                <div class="text-right mt-3">
                    <a href="{{ route('admin.activos.show', $activo, $intervencione) }}" class="btn btn-secondary">Cancelar</a>
                    <button class="btn btn-primary">Actualizar intervención</button>
                </div>

            </form>
        </div>
    </div>
    @stop
