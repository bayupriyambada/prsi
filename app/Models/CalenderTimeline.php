<?php

namespace App\Models;

use App\Models\YearCalenderTimeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalenderTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'category',
        'district',
        'country',
        'document',
    ];

  
}
