<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
