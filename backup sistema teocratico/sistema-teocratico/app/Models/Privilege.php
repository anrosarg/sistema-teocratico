<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['name'];

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'privilege_publisher');
    }
}
