<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PltblCompanyStatus extends Model
{


  public function companies()
  {
      return $this->belongsToMany(Company::class);
  }
}
