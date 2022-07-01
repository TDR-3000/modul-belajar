<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Membuat user dengan factory

        User::create([
            'name' => 'asd',
            'username' => 'asdasd',
            'email' => 'asd@gmail.com',
            'password' => bcrypt('password')
        ]);
        // User::create([
        //     'name' => 'Budi Doremi',
        //     'email' => 'budi.doremi@gmail.com',
        //     'password' => Hash::make('12345')
        // ]);
        User::factory(2)->create();


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // Membuat post dengan factory

        Post::factory(30)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, labore maiores et, dolore aliquid voluptatibus quidem rem perferendis reprehenderit eius eaque iusto saepe quis, quas aut. Eos blanditiis at nemo.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam sed laudantium minus iste animi molestiae praesentium, blanditiis eum consectetur ducimus quis expedita tenetur mollitia soluta? Et quo tempora illum laboriosam aliquam nulla earum. Tempore, unde inventore officiis corporis necessitatibus blanditiis non, quasi laborum, esse itaque provident sint error eum iste omnis? Dolores aperiam possimus sint dignissimos molestias nesciunt quo accusantium similique aut quam iusto expedita modi iure vero neque officiis, id enim sunt inventore voluptas nisi facere quisquam? Delectus laboriosam dignissimos sit id? Dolores mollitia quos autem officiis veritatis alias, nostrum molestias ipsum architecto provident assumenda, possimus perspiciatis pariatur.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, labore maiores et, dolore aliquid voluptatibus quidem rem perferendis reprehenderit eius eaque iusto saepe quis, quas aut. Eos blanditiis at nemo.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam sed laudantium minus iste animi molestiae praesentium, blanditiis eum consectetur ducimus quis expedita tenetur mollitia soluta? Et quo tempora illum laboriosam aliquam nulla earum. Tempore, unde inventore officiis corporis necessitatibus blanditiis non, quasi laborum, esse itaque provident sint error eum iste omnis? Dolores aperiam possimus sint dignissimos molestias nesciunt quo accusantium similique aut quam iusto expedita modi iure vero neque officiis, id enim sunt inventore voluptas nisi facere quisquam? Delectus laboriosam dignissimos sit id? Dolores mollitia quos autem officiis veritatis alias, nostrum molestias ipsum architecto provident assumenda, possimus perspiciatis pariatur.',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, labore maiores et, dolore aliquid voluptatibus quidem rem perferendis reprehenderit eius eaque iusto saepe quis, quas aut. Eos blanditiis at nemo.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam sed laudantium minus iste animi molestiae praesentium, blanditiis eum consectetur ducimus quis expedita tenetur mollitia soluta? Et quo tempora illum laboriosam aliquam nulla earum. Tempore, unde inventore officiis corporis necessitatibus blanditiis non, quasi laborum, esse itaque provident sint error eum iste omnis? Dolores aperiam possimus sint dignissimos molestias nesciunt quo accusantium similique aut quam iusto expedita modi iure vero neque officiis, id enim sunt inventore voluptas nisi facere quisquam? Delectus laboriosam dignissimos sit id? Dolores mollitia quos autem officiis veritatis alias, nostrum molestias ipsum architecto provident assumenda, possimus perspiciatis pariatur.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, labore maiores et, dolore aliquid voluptatibus quidem rem perferendis reprehenderit eius eaque iusto saepe quis, quas aut. Eos blanditiis at nemo.',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam sed laudantium minus iste animi molestiae praesentium, blanditiis eum consectetur ducimus quis expedita tenetur mollitia soluta? Et quo tempora illum laboriosam aliquam nulla earum. Tempore, unde inventore officiis corporis necessitatibus blanditiis non, quasi laborum, esse itaque provident sint error eum iste omnis? Dolores aperiam possimus sint dignissimos molestias nesciunt quo accusantium similique aut quam iusto expedita modi iure vero neque officiis, id enim sunt inventore voluptas nisi facere quisquam? Delectus laboriosam dignissimos sit id? Dolores mollitia quos autem officiis veritatis alias, nostrum molestias ipsum architecto provident assumenda, possimus perspiciatis pariatur.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
