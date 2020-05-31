<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['staff_id', 'check_in', 'check_out'];

    protected $dates = ['check_in', 'check_out'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function getGetCheckInAttribute()
    {
        return $this->check_in->format('h:i d-m-Y');
    }

    public function getGetCheckOutAttribute()
    {
        return $this->check_out ? $this->check_out->format('h:i d-m-Y') : '---';
    }

    public function getGetDiffInHoursAttribute()
    {

        return $this->check_in->diffInHours($this->check_out);
    }
}
