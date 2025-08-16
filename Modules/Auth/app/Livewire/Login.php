<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;
use Modules\Auth\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;

#[Layout('auth::components.layouts.app'), Title('ورود به حساب کاربری')]
class Login extends Component
{
    #[Rule('required')]
    public $email;
    #[Rule('required|min:8')]
    public $password;
    public $remember;


    public function loginUser()
    {
         if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember))
          {
            $user = User::query()->where('email', $this->email)->first();
            Auth::login($user);
            return redirect()->route('panel');
        }else{
          session()->flash('message', 'ایمیل یا رمز عبور اشتباه است یا حساب کاربری شما فعال نشده است');
        }
    }
    public function render()
    {
        return view('auth::livewire.login');
    }
}
