<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $guarded=[];
    protected $table = "patients";
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
