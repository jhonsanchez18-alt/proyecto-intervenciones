<?php


namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;    
use Spatie\Permission\Models\Role as ModelsRole;


class UserIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
{
    $this->resetPage();
}

    public function render()
    {
        $roles = ModelsRole::all();
        $users = User::query()
    ->where(function ($query) {
        $query->where('name', 'LIKE', '%' . $this->search . '%')
              ->orWhere('email', 'LIKE', '%' . $this->search . '%');
    })
    ->paginate(10);
        return view('livewire.admin.user-index', compact('users', 'roles'));
    }
}
