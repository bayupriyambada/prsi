<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'social_links',
        'description',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
