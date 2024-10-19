<?php

namespace App\Models;

use App\Models\CalenderTimeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YearCalenderTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
    ];

    public function calender()
    {
        return $this->hasMany(CalenderTimeline::class);
    }
}
