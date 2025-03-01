<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{   

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration_in_mins',
        'category_id',
        'isActive',
    ];
    
    // Enable timestamps by default
    
    public $timestamps = true; 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'service_Staff');
    }

   

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_service');
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }


    
}
