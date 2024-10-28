<?php

namespace App\Models;

use App\Models\User;
use App\Models\BlogView;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $casts = [
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regional()
    {
        return $this->belongsTo(RegionalBranch::class, 'regional_branch_id');
    }

    public function scopeIsPublished($query, $isPublish = true)
    {
        return $query->where('status', $isPublish);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->user_id = Auth::id();
        });
    }

    public function incrementViews($ipAddress)
    {
        // Cek apakah IP sudah ada dalam blog_views
        if (!$this->hasViewed($ipAddress)) {
            $this->increment('views'); // Increment views
            BlogView::create([
                'blog_id' => $this->id,
                'ip_address' => $ipAddress,
            ]);
        }
    }

    public function hasViewed($ipAddress)
    {
        return BlogView::where('blog_id', $this->id)->where('ip_address', $ipAddress)->exists();
    }
}
