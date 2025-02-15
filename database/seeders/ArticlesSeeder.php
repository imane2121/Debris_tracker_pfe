<?php
namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'title' => 'How to Reduce Plastic Waste',
            'content' => 'Here are 10 tips to reduce plastic waste in your daily life...',
            'author' => 'Admin User',
            'category' => 'guideline',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Upcoming Beach Cleanup Event',
            'content' => 'Join us this weekend for a beach cleanup event...',
            'author' => 'Supervisor One',
            'category' => 'event',
            'published_at' => now()->addDays(3),
        ]);
    }
}