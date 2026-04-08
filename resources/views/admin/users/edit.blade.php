@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Asignar Roles</h1>
@stop

@section('content')
<!-- Mnensaje de éxito -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.classList.remove('show');   // hace fading out
                alert.classList.add('fade');      // transición
                setTimeout(() => alert.remove(), 500); // luego lo remueve del DOM
            }
        }, 5000); // 3000 ms = 3 segundos
    </script>
@endif
    

    <div class="card">
        <div class="card-body">
        <div class="card">
    <div class="card-body">

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row align-items-end">

                <!-- 🧑 Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre del usuario @enderror"
                            value="{{ old('nombre', $user->name) }}"
                        >
                    </div>
                </div>

                <!-- 🎭 Rol -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="role">Rol</label>

                        <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <!-- 🔘 Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Editar Usuario
                        </button>
                    </div>
                </div>

            </div>

        </form>

    </div>
</div>
    </div>
</div>
@stop

