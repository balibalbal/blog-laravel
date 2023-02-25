<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // hanya file id saja yang boleh kosong
    protected $guarded = ['id'];

    //method posts ngambil dari route
    public function posts()
    {
        // di model kategori, butuh relasi dimana 1 kategori bisa banyak postingan ->hasMany
        return $this->hasMany(Post::class);
    }
}
