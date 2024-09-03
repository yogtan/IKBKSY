<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ([
        'name',
        'image',
        'id_department',
        'position'
    ]);

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
