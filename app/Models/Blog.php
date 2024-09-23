<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'publication',
        'image',
        'description',
        'id_category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // $query->where('title', 'like', '%' . request('search') . '%');

        // Search berdasarkan title
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        // // Search berdasarkan title pada category
        // $query->when(
        //     $filters['category'] ?? false,
        //     fn($query, $category) =>
        //     $query->whereHas('category', fn($query) => $query->where('slug', $category))
        // );

        // // Search berdasarkan author
        // $query->when(
        //     $filters['author'] ?? false,
        //     fn($query, $author) =>
        //     $query->whereHas('author', fn($query) => $query->where('author', $author))
        // );
    }
}
