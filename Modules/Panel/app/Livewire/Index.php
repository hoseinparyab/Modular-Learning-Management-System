<?php

namespace Modules\Panel\Livewire;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('panel::livewire.index')->layout('panel::components.layouts.app');
    }

}
