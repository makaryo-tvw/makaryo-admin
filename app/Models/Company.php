<?php

namespace App\Models;

use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    // protected $guard = 'company';

    public $timestamps = false;

    protected $fillable = [
        "bussines_field_id",
        "timezone",
        "name",
        "company_name",
        "email",
        "phone_number",
        "logo_image",
        "address",
        "website",
        "province",
        "city",
        "district",
        "village",
        "postal_code",
        "time_zone",
    ];


    public function workSchedules()
    {
        return $this->hasMany(WorkSchedule::class);
    }

    public function workShifts(){
        return $this->hasMany(WorkShift::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function bussinesField()
    {
        return $this->belongsTo(BusinessField::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = round(microtime(true) * 1000);
            $model->updated_at = round(microtime(true) * 1000);
        });

        static::updating(function ($model) {
            $model->updated_at = round(microtime(true) * 1000);
        });
    }
}
