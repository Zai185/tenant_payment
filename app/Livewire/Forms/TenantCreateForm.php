<?php

namespace App\Livewire\Forms;

use App\Models\Package;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TenantCreateForm extends Form
{
    public Package $currentPackage;
    public $package;
    public $payment_id;

    protected function rules()
    {
        return  [
            "creating_tenant" => [
                'currentPackage' => 'required',
            ],
            "business_info" => [
                'business_name' => 'required',
                'business_domain' => 'required',
                'business_type' => 'required',
            ],
            "payment_information" => [
                'payment_id' => 'required'
            ]

        ];
    }


    public function validateStep($step)
    {
        $this->validate($this->rules()[$step]);
    }
}
