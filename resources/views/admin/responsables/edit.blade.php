@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Editar Responsable</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.responsables.update', $responsable) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Nombre del responsable</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="@error('name') {{ $message }} @else Ingrese el nombre del responsable @enderror"
                            value="{{ old('name', $responsable->name) }}"
                        >
                    </div>
                </div>

                

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Editar responsable
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@stop

