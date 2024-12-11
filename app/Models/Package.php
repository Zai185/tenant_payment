<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'duration',
        'max_users',
        'max_products',
        'max_invoices'
    ];

    public $timestamps = false;
}
