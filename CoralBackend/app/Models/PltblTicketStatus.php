<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblTicketStatus extends Model
{
   public function ticket()
    {
       return $this->belongsToMany(Ticket::class);
    }
}
