<?php

namespace App\Livewire\Forms;

use App\Models\Package;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TenantRegisterForm extends Form
{
    public $first_name, $last_name, $username;
    public $email, $phone;
    public $password, $password_confirmation;
    public $business_name, $business_domain;
    public $payment_id = '';
    public $business_type = '';
    public $business_size;
    public Package $currentPackage;
    public $package;


    protected function rules()
    {
        return  [
            "user_info" => [
                'username' => 'required',
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => ['required', 'confirmed', Password::defaults()],
            ],

            "business_info" => [
                'business_name' => 'required',
                'business_domain' => 'required',
                'business_type' => 'required',
            ],
            "choose_package" => [
                'currentPackage' => 'required',
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
