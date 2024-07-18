<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, HasUuids, SoftDeletes, LocalTimestamp;

    public $timestamps = false;

    protected $fillable = [
        "company_id",
        "name",
        "place_name",
        "note",
        "radius",
        "lat",
        "lng"
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function divisions()
    {
        return $this->belongsToMany(Division::class, "division_location", "location_id", "division_id");
    }

    // boot 
    public static function boot(){
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
