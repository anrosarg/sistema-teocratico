<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'circuit_id',
        'congregation_id',
        'group_id',
        'status',
        'condition'
    ];

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    public function congregation()
    {
        return $this->belongsTo(Congregation::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function privileges()
    {
        // Solo permite la relación si el publicador es ejemplar y bautizado
        if ($this->status !== 'bautizado' || $this->condition !== 'ejemplar') {
            return $this->belongsToMany(Privilege::class, 'privilege_publisher')->whereRaw('1=0');
        }
        return $this->belongsToMany(Privilege::class, 'privilege_publisher');
    }

   /* public function assignments()
    {
        // Solo permite la relación si el publicador es ejemplar y bautizado
        if ($this->status !== 'bautizado' || $this->condition !== 'ejemplar') {
            return $this->belongsToMany(Assignment::class, 'assignment_publisher')->whereRaw('1=0');
        }
        return $this->belongsToMany(Assignment::class, 'assignment_publisher');
    }*/
    public function assignments()
    {
        // Sin restricción
        return $this->belongsToMany(Assignment::class, 'assignment_publisher');
    }
    
}