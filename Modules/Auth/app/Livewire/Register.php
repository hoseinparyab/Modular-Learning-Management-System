<?php
namespace Modules\Auth\Livewire;

use Modules\Auth\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users,email')]
    public $email;
    #[Rule('required|min:6|confirmed')]
    public $password;
    public $password_confirmation;

    public function registerUser(): \Illuminate\Http\RedirectResponse
    {
        $this->validate();

        $user = User::query()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
        ]);

        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('verification.send');

    }
    public function render(): View
    {
        return view('auth::livewire.register')->layout('auth::components.layouts.app');
    }
}
