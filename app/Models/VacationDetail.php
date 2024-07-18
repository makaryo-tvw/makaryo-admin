<?php

namespace App\Models;

use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationDetail extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    public $timestamps = false; 

    protected $fillable = [
        "vacation_id",
        "vacation_date",
    ];

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }

    public static function boot(){
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
