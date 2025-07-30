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

    protected $casts = [
        'asignaciones' => 'array',
    ];

    // RELACIONES

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
        return $this->belongsToMany(Privilege::class, 'privilege_publisher');
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class, 'assignment_publisher');
    }

    // PRIVILEGIOS Y ASIGNACIONES ACTIVOS

    public function activePrivileges()
    {
        return $this->status === 'bautizado' && $this->condition === 'ejemplar'
            ? $this->privileges
            : collect();
    }

    public function activeAssignments()
    {
        return $this->status === 'bautizado' && $this->condition === 'ejemplar'
            ? $this->assignments
            : collect();
    }

    // ACCESSOR NOMBRE COMPLETO

    public function getNombreCompletoAttribute()
    {
        return ucfirst(strtolower($this->first_name)) . ' ' . ucfirst(strtolower($this->last_name));
    }
}