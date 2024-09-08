<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'id_department',
        'position'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_department');

        /* Jika ingin menggunakan code dibawah ini:
         `return $this->belongsTo(Department::class);`

         Maka gunakan penamaan foren key dengan format singular_nama_model_id. Hal ini dikarenakan, 
         Laravel menggunakan konvensi penamaan default untuk menentukan nama kolom foreign key. 
         Konvensi ini adalah sebagai berikut:
         Nama tabel foreign key: 
            Nama model terkait dalam bentuk snake_case, diikuti dengan akhiran _id.
            Contoh seperti : department_id, category_id, blog_id
        */
    }
}
