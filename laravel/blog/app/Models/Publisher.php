<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'last_name', 'type', 'group_id', 'congregation_id', 'circuit_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function congregation()
    {
        return $this->belongsTo(Congregation::class);
    }

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    public function privileges()
    {
        return $this->belongsToMany(Privilege::class);
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }
}
