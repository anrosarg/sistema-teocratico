<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    protected $fillable = ['name', 'circuit_id'];

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}