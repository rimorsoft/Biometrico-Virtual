<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function getCheckInAttribute()
    {
        return $this->records()->whereDate('check_in', date('Y-m-d'))->exists();
    }

    public function getCheckOutAttribute()
    {
        return $this->records()->count()
            ? $this->records()->whereDate('check_out', date('Y-m-d'))->exists()
            : true;
    }

    public function checkIn()
    {
        if ($this->check_in) { return true; }

        $this->records()->create([
            'check_in' => Carbon::now()
        ]);
    }

    public function checkOut()
    {
        if ($this->check_out) { return true; }

        $this->records()->whereDate('check_in', date('Y-m-d'))->update([
            'check_out' => Carbon::now()
        ]);
    }
}
