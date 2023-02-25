<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // hanya file id saja yang boleh kosong
    protected $guarded = ['id'];

    // properti eager loading
    // setiap pemanggilan query post, $with akan terbawa. Ini adalah eager loading. Silahkan baca dokumentasi laravel
    protected $with = ['author','category'];

    public function scopeFilter($query, array $filters) //baca query scope di dokumentasi
    {
        //pelajari method when dimana akan dijalankan ketika bernilai true
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like', '%' . $search . '%')
                  ->orWhere('body','like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category)
        {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author)
        {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    // karena ini tidak dipanggil melalaui route, maka namanya harus foreign_key yang ada di tabel Posts, yaitu category_id, maka di tulis category. Kalau mau diganti, harus ditulis aliasnya dari category_id
    public function category() 
    {
        // mengambil database relasi one to one. 1 postingan hanya memiliki 1 kategori
        return $this->belongsTo(Category::class,);
    }

    // user di ganti author, asal aliasnya di tulis dari user_id
    public function author()
    {
        // mengambil database relasi one to one. 1 postingan hanya memiliki 1 kategori
        return $this->belongsTo(User::class,'user_id');
    }
}
