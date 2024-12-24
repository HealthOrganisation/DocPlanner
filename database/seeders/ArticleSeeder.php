<?php

namespace Database\Seeders;
use App\Models\Article;

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
        'id_admin'=> 1,
        'title'=> 'aaa',
        'content'=> 'aaa',
        'date_posted'=> '2024-01-01',
        'image'=> 'imag.png',
        ]);
        
    }
}
