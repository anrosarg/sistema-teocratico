<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
   protected $table = 'assignments';

    protected $fillable = ['name'];

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }
}
