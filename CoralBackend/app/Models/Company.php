<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function company_status()
    {
        return $this->belongsToMany('App\Models\PltblCompanyStatus','company_company_status', 'company_id', 'company_status_id');
    }

    public function industry()
    {
        return $this->belongsToMany('App\Models\PltblIndustry','company_industry', 'company_id', 'industry_id');
    }

     public function contact()
   {
    return $this->belongsToMany('App\Models\Contact','company_contact', 'company_id', 'contact_id');
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
