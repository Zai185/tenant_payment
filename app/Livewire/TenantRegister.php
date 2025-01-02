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
    public $payment;
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

    public $steps = [
        [
            "title" => "user_info",
            "description" => "Provide your personal details such as first and last name."
        ],

        [
            "title" => "business_info",
            "description" => "Fill in the business name and domain information."
        ],

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
        if (!$this->package_exists) {
            array_splice($this->steps, count($this->steps) - 1, 0,   [[
                "title" => "choose_package",
                "description" => "Choose the package for your business"
            ]]);
        }
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

    public function updatePayment()
    {
        $this->payment = array_values(array_filter($this->payments, function ($p) {
            return $p['id'] == $this->form->payment_id;
        }))[0];
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
