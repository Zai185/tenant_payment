<?php

namespace App\Livewire;

use App\Livewire\Forms\TenantSubscriptionForm;
use App\Models\Subscription;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class TenantSubscription extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $renewMonth;
    public $status = '';
    public $subscription_search;
    public TenantSubscriptionForm $form;
    public $payment = '';
    public $payment_type = 'local';
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

    public function render()
    {
        $statusMap = [
            0 => ['label' => 'pending', 'class' => 'bg-warning'],
            1 => ['label' => 'approved', 'class' => 'bg-success'],
            2 => ['label' => 'expired', 'class' => 'bg-danger'],
            3 => ['label' => 'denied', 'class' => 'bg-danger'],
        ];

        $query = Subscription::join('tenants', 'tenant_id', '=', 'tenants.id')->select('subscriptions.*', 'domain_name', 'name');

        if ($this->status != null) $query->where('subscriptions.status', $this->status);
        if ($this->subscription_search) {
            $query->where(function ($q) {
                $searching_columns = ['tenant_id', 'tenants.name', 'tenants.domain_name', 'expire_at'];
                foreach ($searching_columns as $column) {

                    $q->orWhere($column,  'LIKE', "%" . $this->subscription_search . "%");
                }
            });
        }

        return view(
            'livewire.tenant-subscription',
            [
                'subscriptions' => $query->paginate($this->perPage),
                'statusMap' => $statusMap,
            ]
        );
    }
}
