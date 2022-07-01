<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Jika tidak ada protected $fillabel maka "Model" tidak bisa diisi dengan menggunakan create
    // sehingga akan sesuai dengan schema, jika ada nilai default maka yang digunakan niai default tersebut

    // protected : digunakan untuk menjaga
    // $fillabel : digunakan untuk memberitahu laravel field mana saja yang bileh di isi
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    // ];


    // apa nih yang mau dijagain
    // misal "id", berati sisanya boleh disi
    protected $guarded = ['id'];

    // Mengatasi N+1 problem(eager loading)
    protected $with = ['category', 'author'];

    // Membuat serach yang ditanganioleh moel
    // Parameter $query ini akan memanggil apapun yang ada di depannya
    // Misal Post::filter()->get() (maka dia akan memanggil isi dari tabel Post)
    // Parameter array $filters giunakan untuk pencarian yang lebih kompleks disini mencari title dan body berdasarkan author atau category
    public function scopeFilter($query, array $filters)
    {

        // if ($query) {
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }


        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }


        // null coalescing operator : untuk mengganti ternary dan isset()
        // issset($filters['search']) ? $filters['search'] : flase
        // $filtes['search'] ?? flase
        // when : method yang digunakan untuk mengganti digunakan untuk mengganti kondisi if
        // hereHas : untuk join tabel di database

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });


        // QUERY COBA AMBIL DATA BERDASARKAN SLUG, KARENA DI SEBELUMNYA DATANYA DIAMBIL BERDASRKAN ROUTES/CONTROLLER
        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas(
            'author',
            fn ($query) =>
            $query->where('username', $author)
        ));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // agar slug menjadi default pada query 
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
