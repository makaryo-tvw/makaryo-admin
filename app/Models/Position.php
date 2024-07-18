<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\BootConfig;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model 
{
    use HasFactory, HasUuids, SoftDeletes;

    public $timestamps = false;
    
    protected $fillable = [
        "company_id",
        "name",
        "describtion",
        "code",
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        return $this->hasMany(Employ::class, "position_id", "id");
    }

    public $global_scopes = true;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope());

        static::creating(function ($model) {
            $model->created_at = round(microtime(true) * 1000);
            $model->updated_at = round(microtime(true) * 1000);
            $model->company_id = auth()->guard("company")->user()->company_id;
        });

        static::updating(function ($model) {
            $model->updated_at = round(microtime(true) * 1000);
        });
    }
}
