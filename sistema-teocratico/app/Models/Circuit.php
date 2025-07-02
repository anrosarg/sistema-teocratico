<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = ['name'];

    public function congregations()
    {
        return $this->hasMany(Congregation::class);
    }
}