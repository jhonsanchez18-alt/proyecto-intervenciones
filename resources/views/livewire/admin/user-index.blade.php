<div>
    
   <div class="card">
    <div class="card-header">
        
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o email del usuario">
   
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">Editar</a></td>
                        </tr>
                    @endforeach
               
                </tbody>
            </thead>
        </table>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
   </div>
</div>
