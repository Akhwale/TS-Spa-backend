<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $fillable = ['title', 'description', 'discount_percentage', 'isActive'];

    // Enable timestamps by default
    
    public $timestamps = true; 

    public function services()
    {
        return $this->belongsToMany(Service::class, 'promotion_service');
    }
}
