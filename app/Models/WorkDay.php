<?php

namespace App\Models;

use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkDay extends Model
{
    use HasFactory, HasUuids, SoftDeletes, LocalTimestamp;

    public $timestamps = false;

    protected $fillable = [
        "work_schedule_id",
        "day",
        "type",
        "entry",
        "exit",
        "start_rest",
        "end_rest",
        "max_rest"
    ];

    public function workSchedule(){
        return $this->belongsTo(WorkSchedule::class);
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
