<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = ['user_id', 'staff_id', 'date', 'time'];

    // Enable timestamps by default
    
    public $timestamps = true; 
  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service');
    }
    
}
