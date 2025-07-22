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
        // Relación sin restricciones para poder ver lo que tiene asignado
        return $this->belongsToMany(Privilege::class, 'privilege_publisher');
    }

    public function assignments()
    {
        // Relación sin restricciones
        return $this->belongsToMany(Assignment::class, 'assignment_publisher');
    }

    /**
     * Devuelve los privilegios activos (si es bautizado y ejemplar)
     */
    public function activePrivileges()
    {
        return $this->status === 'bautizado' && $this->condition === 'ejemplar'
            ? $this->privileges
            : collect();
    }

    /**
     * Devuelve las asignaciones activas (si querés hacer algo similar)
     */
    public function activeAssignments()
    {
        return $this->status === 'bautizado' && $this->condition === 'ejemplar'
            ? $this->assignments
            : collect();
    }
}
