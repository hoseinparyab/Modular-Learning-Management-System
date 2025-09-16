<?php
namespace Modules\RolePermissions\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $name;
    public $editedIndex;
    public $user_permissions = [];
    protected $paginationTheme = 'bootstrap';

    public function createRole(): void
    {
        $this->validate();
        $role = Role::query()->create([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->user_permissions);

        $this->reset('name');
        session()->flash('message', 'نقش ایجاد شد');
    }

    public function editRow($id)
    {
        $role = Role::query()->find($id);
        foreach ($role->permissions as $permission) {
            $this->user_permissions[] = $permission->name;
        }
        $this->name        = $role->name;
        $this->editedIndex = $id;
    }

    public function updateRow()
    {
        $this->validate();
        $role = Role::query()->find($this->editedIndex);
        $role->update([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->user_permissions);
        $this->user_permissions = [];
        $this->reset('name');
        session()->flash('message', 'نقش ویرایش شد');
        $this->editedIndex = null;
    }

    #[On('destroy-role')]
    public function destroyRole($id)
    {
        Role::destroy($id);
    }

    #[Layout('panel::layouts.app'), Title('نقش ها')]
    public function render()
    {
        $permissions = Permission::query()->pluck('name');
        $roles       = Role::query()->paginate(10);
        return view('rolepermissions::livewire.roles', compact('roles', 'permissions'));
    }
}

