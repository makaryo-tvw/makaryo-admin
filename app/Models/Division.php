<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use App\Traits\LocalTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, HasUuids, SoftDeletes, LocalTimestamp;

    public $timestamps = false;

    protected  $fillable = [
        "company_id",
        "work_schedule_id",
        "work_shift_id",
        "name",
        "late_charge",
        "work_type",
        "note_entry_status",
        "note_exit_status",
        "note_start_overtime_status",
        "note_end_overtime_status",
        "entry_fit_location",
        "exit_fit_location",
        "start_rest_fit_location",
        "end_rest_fit_location",
        "start_overtime_fit_location",
        "end_overtime_fit_location",
        "restrict_before_entry",
        "restrict_after_entry",
        "restrict_exit",
        "device_validation",
        "unfit_location_email",
        "first_present_email",
    ];
    

    public function lateCharges()
    {
        return $this->hasMany(LateCharge::class, "division_id", "id");
    }

    public function company()
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    public function workSchedule()
    {
        return $this->belongsTo(WorkSchedule::class, "work_schedule_id", "id");
    }

    public function workShift(){
        return $this->belongsTo(WorkShift::class, "work_shift_id", "id");
    }

    public function employees()
    {
        return $this->hasMany(Employ::class, "division_id", "id");
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, "division_location", "division_id", "location_id");
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
