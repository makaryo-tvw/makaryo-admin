<?php

namespace App\Models;

use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitHourSubtitute extends Model
{
    use HasFactory, HasUuids, LocalTimestamp;

    protected $fillable = [
        "permit_id",
        "note",
        "type",
        "hour",
        "status"
    ];

    protected $appends = [
        'file_url',
    ];

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);
    }

    public function pemit()
    {
        return $this->belongsTo(Permit::class);
    }
}
