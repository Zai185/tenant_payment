<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturePackage extends Model
{

    protected $table = "feature_package";
    protected $fillable = [
        'package_id',
        'feature_id'
    ];

    public $timestamps = false;
}
