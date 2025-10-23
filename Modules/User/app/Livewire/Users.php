<?php
namespace Modules\User\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\app\Models\User;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;
    public $selected_user;
    public $user_roles         = [];
    protected $paginationTheme = 'bootstrap';

    public function selectUser($user_id)
    {
        $this->selected_user = User::query()->find($user_id);
        foreach ($this->selected_user->getRoleNames() as $role) {
            $this->user_roles[] = $role;
        }
    }
    public function createUserRoles()
    {
        $this->selected_user->syncRoles($this->user_roles);
    }
    #[Layout('panel::layouts.app'), Title('کاربران')]
    public function render(): View
    {

        $roles = Role::query()->pluck('name');
        return view('user::livewire.users', compact('users', 'roles'));
    }
}
