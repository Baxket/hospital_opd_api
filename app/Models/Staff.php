<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'staff_num',
        'full_name',
        'staff_type_id',
        'phone_number',
        'dob',
        'residence',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
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
