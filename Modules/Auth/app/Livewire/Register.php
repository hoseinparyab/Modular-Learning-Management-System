<?php
namespace Modules\Auth\Livewire;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\User\app\Models\User;

class Register extends Component
{
    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users,email')]
    public $email;
    #[Rule('required|min:6|confirmed')]
    public $password;
    public $password_confirmation;

    public function registerUser()
    {
        $this->validate();

        $user = User::query()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('verification.send');

    }
    #[Layout('auth::layouts.app'), Title('ثبت نام')]
    public function render(): View
    {
        return view('auth::livewire.register');
    }
}
