<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

   protected $guarded = [];


   public function event_type()
   {
    return $this->belongsToMany('App\Models\PltblEventType','event_event_type', 'event_id', 'event_type_id');
   }

    public function user()
   {
       return $this->belongsTo(User::class);
   }
}
