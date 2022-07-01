<?php

namespace App\Models;

class Post
{
    // properti statis
    // modifier privat : hanya dapat diakses di kelas ini saja
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Alfian Yulianto",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam perferendis eaque enim quae amet rerum at molestias fugit non placeat..."
        ],
        [
            "title" => "Judul Post Alfian",
            "slug" => "judul-post-kedua",
            "author" => "Budi Doremi",
            "body" => "Lorem ipsum dolor..."
        ]
    ];

    // membuat method secara static
    public static function all()
    {
        // self : untuk memanggil  static property dari class yang sama
        // parent : untuk memanggil  static property dari class parent

        // kalau $blog_post sebagai properti biasa gunakan $this->blog_post
        // $post = new Post();
        // return collect($post->blog_posts);

        // karena $blog_posts static maka butuh keyword self::
        // return self::$blog_posts;

        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // $posts = self::$blog_posts;
        // static untuk method static
        $posts = self::all();

        // // karena sudah menggunakan collection tidak perlu loop
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

        // // firstWhare : ambil satu data yang pertama kali ditemukan dimana slugnya sama dengan $slug
        return $posts->firstWhere('slug', $slug);
    }
}
