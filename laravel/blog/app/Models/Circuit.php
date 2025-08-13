<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = ['name'];

    public function publishers()
    {
        return $this->hasMany(Publisher::class);
    }
}
