<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $fillable = ['name', 'email', 'phone_number', 'isAvailable'];

    // Enable timestamps by default
    
    public $timestamps = true; 

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_staff');
    }
    
}
