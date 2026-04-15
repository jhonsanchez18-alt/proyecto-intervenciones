<div>
    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-success');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    @endif

    <!-- FORMULARIO -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="row align-items-end">

                    <!-- Nombre -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="@error('name') {{ $message }} @else Ingrese el nombre @enderror"
                                value="{{ old('name') }}"
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="@error('email') {{ $message }} @else Ingrese el correo @enderror"
                                value="{{ old('email') }}"
                            >
                            
                        </div>
                    </div>
                    <!-- pas -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="@error('password') {{ $message }} @else Ingrese la contraseña @enderror"
                                value="{{ old('password') }}"
                            >
                            
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="">Seleccione un rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Botón -->
                    <div class="col-md-2">
                        <div class="form-group">
                            @can('admin.users.create')
                                <button class="btn btn-primary btn-block mt-4">
                                    Crear Usuario
                                </button>
                            @else
                                <button class="btn btn-primary btn-block mt-4" disabled>
                                    Crear Usuario
                                </button>
                            @endcan
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- TABLA -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-sm ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                @endforeach
                            </td>

                            <!-- Editar -->
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">
                                    Editar
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td width="10px">
                                @can('admin.users.destroy')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Eliminar usuario?')">
                                            Eliminar
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-danger" disabled>
                                        Eliminar
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</div>
