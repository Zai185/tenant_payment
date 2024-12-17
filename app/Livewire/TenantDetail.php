<?php

namespace App\Livewire;

use Livewire\Component;

class TenantDetail extends Component
{
    public $name = 'min';
    public $currentStep = 'Security';
    public function render()
    {
        $steps = ['Overview', 'Security', 'Logs'];
        return view('livewire.tenant-detail',[
            'steps' => $steps
        ]);
    }
}
