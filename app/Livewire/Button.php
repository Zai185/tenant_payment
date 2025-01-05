<?php

namespace App\Livewire;

use App\Helpers\ButtonCVA;
use Livewire\Component;

class Button extends Component
{
    public $cvaClass;
    public $intent;
    public function mount($intent)
    {
        $this->intent = $intent;
        $this->cvaClass = ButtonCVA::new($intent);
    }
    public function render()
    {
        return view('components.button');
    }
}
