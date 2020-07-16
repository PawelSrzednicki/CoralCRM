<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblIndustry extends Model
{  
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
