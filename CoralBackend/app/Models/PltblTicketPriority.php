<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblTicketPriority extends Model
{
   public function ticket()
    {
       return $this->belongsToMany(Ticket::class);
    }
}
