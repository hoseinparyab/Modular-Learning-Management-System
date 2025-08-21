<?php

namespace Modules\Auth\Livewire;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;


class ResetPassword extends Component
{
    #[Url]
    public $email;
    public $token;
    #[Rule('required|min:6|confirmed')]
    public $password;
    public $password_confirmation;
    public function mount($token)
    {
      $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();
        $result = Password::reset(
            ['email' => $this->email,'password'=>$this->password, 'token' => $this->token],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if($result===Password::PASSWORD_RESET){
            return redirect()->route('login');
        }

        session()->flash('message','خطا در تغییر پسورد');
     }
#[Layout('auth::layouts.app'),Title('فراموشی رمز عبور')]
    public function render():View
    {
        return view('auth::livewire.reset-password');
    }
}
