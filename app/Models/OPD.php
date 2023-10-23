<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPD extends Model
{
    use HasFactory;

    public function staff()
    {
        return $this->hasMany( Staff::class);
    }

    public function patient()
    {
        return $this->hasMany( Patient::class);
    }
}
