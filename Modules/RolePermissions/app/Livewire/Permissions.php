<?php
namespace Modules\RolePermissions\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $name;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';

    public function createPermission(): void
    {
        Permission::query()->create([
            'name' => $this->name,
        ]);
        $this->dispatch('swal', [
            'title'             => 'دسته‌بندی با موفقیت ایجاد شد',
            'timer'             => 3000,
            'icon'              => 'success',
            'toast'             => true,
            'position'          => 'top-end',
            'showConfirmButton' => false,
        ]);

    }

    public function editRow($id)
    {
        $permission        = Permission::query()->find($id);
        $this->name        = $permission->name;
        $this->editedIndex = $id;
    }

    public function updateRow()
    {
        Permission::query()->find($this->editedIndex)->update([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->dispatch('swal', [
    'title'             => 'دسته‌بندی با موفقیت ویرایش شد',
    'timer'             => 3000,
    'icon'              => 'success',
    'toast'             => true,
    'position'          => 'top-end',
    'showConfirmButton' => false,
]);

        $this->editedIndex = null;
    }

    #[On('destroy-permission')]
    public function destroyPermission($id)
    {
        Permission::destroy($id);
        $this->dispatch('swal', [
            'title'             => 'دسته‌بندی با موفقیت حذف شد',
            'timer'             => 3000,
            'icon'              => 'success',
            'toast'             => true,
            'position'          => 'top-end',
            'showConfirmButton' => false,
        ]);
    }

    #[Layout('panel::layouts.app'), Title('مجوزها')]
    public function render(): View
    {
        $permissions = Permission::query()->paginate(10);
        return view('rolepermissions::livewire.permissions', compact('permissions'));
    }
}
