<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LateCharge extends Model
{
    use HasFactory, HasUuids, SoftDeletes, LocalTimestamp;

    public $timestamps = false;

    protected $fillable = [
        "division_id",
        "operator",
        "minute",
        "charge",
        "status"
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, "division_id", "id");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope('division'));

        static::creating(function ($model) {
            $model->created_at = round(microtime(true) * 1000);
            $model->updated_at = round(microtime(true) * 1000);
        });

        static::updating(function ($model) {
            $model->updated_at = round(microtime(true) * 1000);
        });
    }

}
