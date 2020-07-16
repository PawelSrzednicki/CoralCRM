<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblLifecycleStage extends Model
{
  public function contact()
   {
       return $this->belongsToMany(Contact::class);
   }
}
