<?php

namespace App\Traits;

trait LocalTimestamp
{
  public function setCreatedAtAttribute($value)
  {
    $this->attributes['created_at'] = round(microtime(true) * 1000);
  }
  
  public function setUpdatedAtAttribute($value)
  {
      $this->attributes['updated_at'] = round(microtime(true) * 1000);
  }

}