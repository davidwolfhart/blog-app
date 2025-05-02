<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'image', 'excerpt', 'body', 'published_at'];

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    // public function scopeFilter($query)
    // {
    //     if(request('search')) {
    //         return $query->where('title', 'like', '%' . request('search') . '%')
    //             ->orWhere('body', 'like', '%' . request('search') . '%');
    //     }
    // if(isset($filters['search']) ? $filters['search'] : false) {
    //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
    // }
    // }

    public function scopeFilter($query, array $filters)
    {
        // $query->when($filters['search'] ?? false, function($query, $search) {
        //     return $query->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%');
        // });

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->withTrashed()->where('slug', $category);
            });
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
