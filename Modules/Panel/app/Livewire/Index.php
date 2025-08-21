<?php

namespace Modules\Panel\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Index extends Component
{
    #[Layout('panel::layouts.app')]
    #[title('داشبورد')]
    public function render()
    {
        return view('panel::livewire.index');
    }
}
