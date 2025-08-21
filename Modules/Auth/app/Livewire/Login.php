<?php
namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\User\app\Models\User;

class Login extends Component
{
    #[Rule('required')]
    public $email;
    #[Rule('required')]
    public $password;
    public $remember;

    public function loginUser()
    {
        $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $user = User::query()->where('email', $this->email)->first();
            Auth::login($user);
            return redirect()->route('panel.index');
        } else {
            session()->flash('message', 'اطلاعات وارد شده صحیح نمی باشد');
        }
    }
    #[Layout('auth::layouts.app'), Title('ورود')]
    public function render()
    {
        return view('auth::livewire.login');
    }
}
