<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

   protected $guarded = [];

   public function lead_status()
   {
    return $this->belongsToMany('App\Models\PltblLeadStatus','lead_lead_status', 'lead_id', 'lead_status_id');
   }

   public function lead_type()
   {
    return $this->belongsToMany('App\Models\PltblLeadType','lead_lead_type', 'lead_id', 'lead_type_id');
   }

    public function sales_pipeline()
   {
    return $this->belongsToMany('App\Models\PltblSalespipeline','lead_sales_pipeline', 'lead_id', 'sales_pipeline_id');
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
