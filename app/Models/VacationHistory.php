<?php

namespace App\Models;

use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationHistory extends Model
{
    use HasFactory, HasUuids;

    // public $timestamps = false; 

    protected $fillable = [
        "employ_id",
        "start_day_off",
        "end_day_off",
        "total_day_off",
        "status",
    ];

    public function employ()
    {
        return $this->belongsTo(Employ::class);
    }
}
