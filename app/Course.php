<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
