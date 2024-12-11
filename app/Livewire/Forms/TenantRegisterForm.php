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
    public $business_type = '';
    public $business_size;
    public Package $currentPackage;
    public $package;


    protected function rules()
    {
        return  [
            "user_info" => [
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required',
            ],
            "account_info" => [
                'email' => 'required|email',
                'phone' => 'required|string'
            ],
            'password' => [
                'password' => ['required', 'confirmed', Password::defaults()],
            ],
            "business_info" => [
                'business_name' => 'required',
                'business_domain' => 'required'
            ],
            "business_type" => [
                'business_type' => 'required',
                'business_size' => 'required|integer'
            ],
            "choose_package" => [
                "package" => 'required',
                "currentPackage" => "required"
            ]
        ];
    }
    protected $messages = [
        'currentPackage.required' => "You must choose one package to continue"
    ];


    public function validateStep($step)
    {
        $this->validate($this->rules()[$step]);
    }
}
