<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Enable timestamps by default
    
    public $timestamps = true; 

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
