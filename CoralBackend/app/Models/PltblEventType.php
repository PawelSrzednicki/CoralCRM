<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblEventType extends Model
{
   public function event()
   {
       return $this->belongsToMany(Event::class);
   }
}
