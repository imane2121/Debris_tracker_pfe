<?php
namespace Database\Seeders;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run()
    {
        Media::create([
            'signal_id' => 3, // Link to a signal
            'type' => 'photo', // Media type
            'url' => 'https://example.com/photo1.jpg', // URL of the media
        ]);

        Media::create([
            'signal_id' => 2, // Link to a signal
            'type' => 'video', // Media type
            'url' => 'https://example.com/video1.mp4', // URL of the media
        ]);
    }
}