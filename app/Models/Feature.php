<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function packages(){
        return $this->belongsToMany(Package::class);
    }
}
