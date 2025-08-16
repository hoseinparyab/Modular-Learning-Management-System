<?php

namespace Modules\Panel\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('panel::components.app'), Title('داشبورد')]
class Index extends Component
{
    public function render()
    {
        return view('panel::livewire.index');
    }

}
