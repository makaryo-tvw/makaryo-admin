<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    public $timestamps = false; 

    protected $fillable = [
        "employ_id",
        "note",
        "file",
        "status",
    ];

    protected $appends = [
        'file_url',
    ];

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }

    public function employ()
    {
        return $this->belongsTo(Employ::class);
    }

    public function vacationDetails()
    {
        return $this->hasMany(VacationDetail::class);
    }

    public static function boot(){
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
