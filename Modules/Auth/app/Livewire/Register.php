<?php

namespace Modules\Auth\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class Register extends Component
{
    public $name;
    #[Rule('required|email |unique:users,email')]
    public $email;
    #[Rule('required|min:8')]
    public $password;
    #[Rule('required|min:8|confirmed')]
    public $password_confirmation;
    public $remember;


    public function RegisterUser()
    {
        $this->validate();
        $user =User::query()->create([ 'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        Auth::login($user);
       event(new Registered($user));
       return redirect()->route('dashboard');
    }
    public function render(): View
    {
        return view('auth::livewire.register')->layout('auth::components.layouts.app');
    }
}
