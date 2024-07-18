<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    public $timestamps = false;

    protected $fillable = [
        "employ_id",
        "work_schedule_id",
        "work_shift_id",
        "location_id",
        "note",
        "file",
        "image",
        "present_at",
        "is_late",
        "is_fit_location",
        "is_validated_device",
        "type",
        "status",
        "lat",
        "lng",
        "start_schedule",
        "end_schedule",
        "date_schedule"
    ];

    protected $appends = [
        'file_url',
        'image_url',
    ];

    public function previousPresent()
    {
        return $this->hasOne(PreviousPresent::class);
    }

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function employ()
    {
        return $this->belongsTo(Employ::class);
    }

    public function presentDevice()
    {
        return $this->hasOne(PresentDevice::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope("employ"));

        static::creating(function ($model) {
            $model->created_at = round(microtime(true) * 1000);
            $model->updated_at = round(microtime(true) * 1000);
        });

        static::updating(function ($model) {
            $model->updated_at = round(microtime(true) * 1000);
        });
    }
}
