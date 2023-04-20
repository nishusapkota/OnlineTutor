<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Course;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    
    
    
    public function run()
    {
        $faker = Faker::create();
        // Get random course
       // $course = Course::inRandomOrder()->first();
       $courseIds = Course::pluck('id')->all();
        // Create 20 posts
        for ($i = 1; $i <= 20; $i++) {
            $title = 'Post ' . $i;
            $slug = Str::slug($title);
            $body = $faker->paragraphs(3, true);

            // Generate a fake image file
           

            // Upload the image to storage
            $courseId = $faker->randomElement($courseIds);

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'body' => $body,
                'image' => "null",
                'course_id' => $courseId,
                // Add other fields as needed
            ]);
    }
}
}
