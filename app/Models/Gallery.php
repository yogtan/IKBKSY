<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_event',
        'is_released',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
