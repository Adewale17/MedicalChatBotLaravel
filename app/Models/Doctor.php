<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = ['id'];

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }


}
