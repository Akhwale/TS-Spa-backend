<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{


    // Enable timestamps by default
    
    public $timestamps = true; 
    
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
    
}
