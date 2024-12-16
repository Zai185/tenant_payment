<?php

namespace App\Livewire;

use App\Models\Subscription;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class TenantSubscription extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $status = '';
    public $subscription_search;


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
