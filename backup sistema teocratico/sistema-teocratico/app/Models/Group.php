<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'congregation_id'];

    public function congregation()
    {
        return $this->belongsTo(Congregation::class);
    }

    public function publishers()
    {
        return $this->hasMany(Publisher::class);
    }
}