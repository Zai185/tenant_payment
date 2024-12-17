<?php

namespace App\Livewire;

use Livewire\Component;

class SubscriptionRenew extends Component
{
    public $renewMonth;

    public function render()
    {
        return view('livewire.subscription-renew');
    }
}
