<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblContactStatus extends Model
{
   public function contact()
   {
       return $this->belongsToMany('App\Models\Contact','contact_contact_lead_status', 'contact_lead_status_id', 'contact_id');
   }
}
