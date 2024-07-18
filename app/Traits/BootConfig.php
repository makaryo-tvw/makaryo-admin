<?php

namespace App\Traits;

trait BootConfig {

  public static $global_scope = false;

  public function setConfig(){}

  protected static function boot()
  {
    parent::boot();
    
    static::creating(function ($model) {
        // $model->created_at = round(microtime(true) * 1000);
        // $model->updated_at = round(microtime(true) * 1000);
        // $model->company_id = auth()->guard("company")->user()->id;
    });

  }

}