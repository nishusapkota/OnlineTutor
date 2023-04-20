<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get all post IDs
        $postIds = Post::pluck('id')->all();

        // Get all user IDs
        $userIds = User::pluck('id')->all();

        // Create 50 comments
        for ($i = 1; $i <= 50; $i++) {
            $comment = $faker->paragraph;
            $postId = $faker->randomElement($postIds);
            $userId = $faker->randomElement($userIds);
            $parentId = $faker->boolean(30) ? $faker->numberBetween(1, $i-1) : null;

            Comment::create([
                'user_id' => $userId,
                'post_id' => $postId,
                'parent_id' => $parentId,
                'comment' => $comment,
                // Add other fields as needed
            ]);
        }
    }

}
