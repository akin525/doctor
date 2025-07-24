<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $guarded=[];
    protected $table = "doctors";

    // Doctor.php
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

}
