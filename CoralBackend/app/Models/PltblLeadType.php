<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblLeadType extends Model
{ public function lead()
    {
       return $this->belongsToMany(Lead::class);
    }
}
