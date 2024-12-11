<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{
    public function render()
    {
        return view(
            'livewire.packages',
            [
                'packages' => Package::limit(3)->with('features')->get()
            ]
        );
    }
}
