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
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => ['required', 'confirmed', Password::defaults()],
            ],
          
            "business_info" => [
                'business_name' => 'required',
                'business_domain' => 'required',
                'business_type' => 'required',
                'business_size' => 'required|integer'
            ],
           
        ];
    }
    public function validateStep($step)
    {
        $this->validate($this->rules()[$step]);
    }
}
