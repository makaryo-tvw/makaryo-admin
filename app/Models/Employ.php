<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employ extends Authenticatable implements JWTSubject
{
    use HasFactory, HasUuids, SoftDeletes, HasApiTokens, HasFactory, Notifiable, LocalTimestamp;

    public $timestamps = false;

    protected $fillable = [
        "company_id",
        "division_id",
        "position_id",
        "type", //magang, tetap, kontak, part-time, remote,
        "name",
        "gender",
        "phone_number",
        "time_zone",
        "id_type", //ktp, sim
        "id_file",
        "employ_number",
        "profile_photo",
        "birth_date",
        "work_start",
        "remain_day_off",
        "end_day_off",
        "email",
        "password",
        "status",
    ];

    protected $appends = [
        'profile_photo_url',
        'id_file_url',
    ];

    protected $guard     = 'employ';
    public $incrementing =false;
    protected $keyType   ='string';

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function vacations()
    {
        return $this->hasMany(Vacation::class, "employ_id", "id");
    }

    public function position()
    {
        return $this->belongsTo(Position::class, "position_id", "id");
    }

    public function division()
    {
        return $this->belongsTo(Division::class, "division_id", "id");
    }

    public function getProfilePhotoUrlAttribute()
    {
        return asset('storage/' . $this->profile_photo);
    }

    public function getIdFileUrlAttribute()
    {
        return asset('storage/' . $this->id_file);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function device()
    {
        return $this->hasOne(EmployDevice::class, "employ_id", "id");
    }

    public function presents()
    {
        return $this->hasMany(Present::class, "employ_id", "id");
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function vacationHistories()
    {
        return $this->hasMany(VacationHistory::class, "employ_id", "id");
    }

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
