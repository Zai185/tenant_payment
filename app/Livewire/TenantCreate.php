<?php

namespace App\Livewire;

use App\Livewire\Forms\TenantCreateForm;
use App\Models\Package;
use Livewire\Component;

class TenantCreate extends Component
{
    public $step = 1;
    public TenantCreateForm $form;
    public $payment_type = 'local';
    public $payment;
    public $steps = [
        [
            "title" => "creating_tenant",
            "description" => "Final step for creating your business."
        ],
        [
            "title" => "business_info",
            "description" => "Fill in the business name and domain information."
        ],
    ];
    public $payments = [
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


    public function updateCurrentPackage($name)
    {
        $this->form->currentPackage = Package::where("name", $name)->first();
    }

    public function stepForward()
    {
        $this->form->validateStep($this->steps[$this->step - 1]['title']);
        $this->step++;
    }
    public function stepBack()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.tenant-create', [
            'packages' => Package::limit(3)->get()
        ]);
    }
}
