<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{protected $guarded = [];

   public function ticket_priority()
    {
      return $this->belongsToMany('App\Models\PltblTicketPriority','ticket_priority_ticket', 'ticket_id', 'ticket_status_id');
    }

    public function ticket_status()
    {
      return $this->belongsToMany('App\Models\PltblTicketStatus','ticket_status_ticket', 'ticket_id', 'ticket_status_id');
    }
}
