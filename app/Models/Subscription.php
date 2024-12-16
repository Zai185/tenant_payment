<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'expire_at',
        'status',
        'payment',
        'subscription_code'
    ];
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
