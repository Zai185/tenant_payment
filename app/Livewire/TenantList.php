<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class TenantList extends Component
{

    use WithPagination;
    public $tenant_search = '';
    public $perPage = 10;
    public $status = '';

    public function updatePerPage()
    {
        $this->resetPage();
    }
    public function render()
    {

        $statusMap = [
            0 => ['label' => 'running', 'class' => 'bg-success'],
            1 => ['label' => 'stopped', 'class' => 'bg-danger'],
        ];

        $query = Tenant::query();
        if ($this->status != null) $query->where('status', $this->status);
        if ($this->tenant_search) {
            $query->where(function ($q) {
                $searching_columns = ['name', 'domain_name'];
                foreach ($searching_columns as $column) {

                    $q->orWhere($column,  'LIKE', "%" . $this->tenant_search . "%");
                }
            });
        }


        return view('livewire.tenant-list', [
            'tenants' => $query->paginate($this->perPage),
            'statusMap' => $statusMap
        ]);
    }
}
