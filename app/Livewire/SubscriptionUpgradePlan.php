<?php

namespace App\Livewire;

use App\Livewire\Forms\SubscriptionUpgradePlanForm;
use App\Models\Package;
use Livewire\Component;

class SubscriptionUpgradePlan extends Component
{
    public $step = 2;
    public SubscriptionUpgradePlanForm $form;
    public $renewMonth;
    public $payment = '';
    public $payment_type = 'local';
    public $payments =  [
        [
            'id' => 1,
            'name' => 'Kpay',
            'account_name' => "Min Khant",
            'account_number' => "09943234543",
            'qr_code' => "foo.jpg"
        ],
        [
            'id' => 2,
            'name' => 'Wave',
            'account_name' => "Thiri",
            'account_number' => "0943872384",
            'qr_code' => "boo.jpg"
        ],
        [
            'id' => 3,
            'name' => 'Kbz Banking',
            'account_name' => "Thiri",
            'account_number' => "1233 4234 2342 4533",
            'qr_code' => null
        ],
    ];

    public function updatePayment()
    {
        $this->payment = array_values(array_filter($this->payments, function ($p) {
            return $p['id'] == $this->form->payment_id;
        }))[0];
    }
    public function render()
    {
        return view('livewire.subscription-upgrade-plan',
    [
        'package' => Package::find(1)
    ]);
    }
}
