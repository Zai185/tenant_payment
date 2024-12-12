<?php

namespace App\Livewire;

use App\Livewire\Forms\TenantRegisterForm;
use App\Models\Package;
use Livewire\Component;

class TenantRegister extends Component
{
    public $step = 1;
    public TenantRegisterForm $form;
    public $payment_type = 'local';
    public $package_exists;

    public $steps = [
        [
            "title" => "user_info",
            "description" => "Provide your personal details such as first and last name."
        ],
        // [
        //     "title" => "account_info",
        //     "description" => "Enter your email address and phone number."
        // ],
        // [
        //     "title" => "password",
        //     "description" => "Set a secure password for your account."
        // ],
        [
            "title" => "business_info",
            "description" => "Fill in the business name and domain information."
        ],
        // [
        //     "title" => "business_type",
        //     "description" => "Specify the type and size of your business."
        // ],
        // [
        //     "title" => "choose_package",
        //     "description" => "Choose your desire package."
        // ],
        [
            "title" => "payment_information",
            "description" => "Final step for creating your business."
        ]

    ];

    public function mount()
    {
        $this->form->package = request()->query('package');
        $this->package_exists = Package::where("name", $this->form->package)->exists();
        $this->form->currentPackage = $this->package_exists
            ? Package::where("name", $this->form->package)->first()
            : new Package();
    }

    public function submit()
    {

        $this->stepForward();
        if ($this->step <= count($this->steps)) return;
        $this->redirectRoute('packages.payment', [
            'package' => 'hey'
        ], false);
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

    public function updateDomain()
    {

        $domain = strtolower(str_replace(" ", "", $this->form->business_name));
        $this->form->business_domain = $domain;
    }

    public function updateCurrentPackage($name)
    {
        $this->form->currentPackage = Package::where("name", $name)->first();
    }

    public function render()
    {

        return view(
            'livewire.tenant-register',
            [
                'business_types' => [
                    "E-commerce",
                    "Education",
                    "Market",
                    "Hotel"
                ],
                'packages' => Package::limit(3)->get()
            ]
        );
    }
}
