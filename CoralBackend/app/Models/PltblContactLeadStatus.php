<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblContactLeadStatus extends Model
{
     public function contacts()
     {
          return $this->belongsToMany(\App\Models\Contact::class);
     }
}
