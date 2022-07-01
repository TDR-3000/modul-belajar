<?php

namespace App\Http\Controllers;

// digunakan untuk menangani form
// seperti data di url
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    // index() ini sebagai method default
    public function index()
    {
        // Membuat serach
        // orWhere : atau cari berdasarkan apa?
        // $posts = Post::latest();
        // if (request('search')) {
        //     $posts->where('title', 'like', '%' . request('search') . '%')
        //  ->orWhere('title', 'like', '%' . request('search') . '%');
        // }

        // 
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('/posts', [
            // Post_Lama
            // "title" => "Blog",
            // memanggil method static
            // "posts" => Post::all()

            "title" => "All Post " . $title,
            'active' => 'posts',

            // mengatasi N+1 problem
            // "posts" => Post::with(['author', 'category'])->latest()->get;

            // lates : mengambil data yang tampil data yang terbaru
            // menggunakan search dan pagination
            // withQueryString : artinya kirimkan query sebelumnya juga
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->simplePaginate(4)->withQueryString()



        ]);
    }


    // sebelum menggunakan routes model banding
    // public function show($id)
    // {
    //     return view('/post', [
    //         "title" => "Single Post",
    //         "post" => Post::find($id)
    //     ]);
    // }

    // Routes Model Banding
    // Artinya saat kita menyuntikan sebuah id kedalam sebuah routes atau controller yang biasa kita lakukan adalah quer record yang kita cari berdasarkan id
    public function show(Post $post)
    {
        return view('/post', [
            'title' => 'Single Post',
            'active' => 'posts',
            'post' => $post
        ]);
    }
}
