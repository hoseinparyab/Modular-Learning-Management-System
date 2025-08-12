<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;

class ForgotPassword extends Component
{
    public function render()
    {
        return view('auth::livewire.forgot-password')->layout('auth::components.layouts.app');
    }
}


