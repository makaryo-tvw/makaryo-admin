<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentRevision extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    protected $fillable = [
        "present_id",
        "present_at",
        "status",
        "note",
        "file",
    ];

    protected $appends = [
        'file_url',
    ];


    public function present()
    {
        return $this->belongsTo(Present::class);
    }

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope("present.employ"));

        static::creating(function ($model) {
            $model->created_at = round(microtime(true) * 1000);
            $model->updated_at = round(microtime(true) * 1000);
        });

        static::updating(function ($model) {
            $model->updated_at = round(microtime(true) * 1000);
        });
    }
}
