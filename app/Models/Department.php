<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ([
        'sector'
    ]);

    public function Member()
    {
        return $this->hasMany(Member::class);
    }
}
