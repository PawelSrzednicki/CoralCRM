<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


   protected $guarded = [];

   public function contact_lead_status()
   {
       return $this->belongsToMany('App\Models\PltblContactLeadStatus','contact_contact_lead_status', 'contact_id', 'contact_lead_status_id');
   }

   public function contact_status()
   {
       return $this->belongsToMany('App\Models\PltblContactStatus', 'contact_contact_status', 'contact_id', 'contact_status_id');
   }

    public function lifecyclestage()
   {
       return $this->belongsToMany('App\Models\PltbllifecycleStage', 'contact_lifecycle_stage', 'contact_id', 'lifecycle_stage_id');
   }

   public function companies()
   {
       return $this->belongsToMany('App\Models\Company', 'company_contact', 'contact_id', 'company_id');
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
