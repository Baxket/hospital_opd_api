<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'staff_num',
        'full_name',
        'staff_type_id',
        'phone_number',
        'dob',
        'residence',
        'email',

    ];
    
    public function staff_type()
    {
        return $this->belongsTo(StaffType::class);
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
