<?php

namespace App\Models;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'location',
        'publication',
        'description',
        'id_category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function gallery()
    {
        // return $this->hasMany(Gallery::class);
        return $this->hasMany(Gallery::class, 'id_event');
    }
}
