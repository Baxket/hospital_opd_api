<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function opd()
    {
        return $this->hasMany( OPD::class);
    }

    public function pharmacy()
    {
        return $this->hasMany( Pharmacy::class);
    }

}
