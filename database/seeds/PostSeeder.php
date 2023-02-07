<?php

use App\Tag;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = Tag::all()->pluck('id'); // [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        $tagCount = count($tags); // 12

        $users = User::all()->pluck('id'); // [1, 2, 3]
        $userMaxIndex = count($users) - 1; // 3 - 1 = 2

        for ($i = 0; $i < 20; $i++) {
            $post = Post::create([
                'user_id'       => $users[rand(0, $userMaxIndex)],
                'title'         => $faker->words(rand(3, 7), true),
                'city'          => $faker->city(),
                'description'   => $faker->paragraphs(rand(2, 6), true),
            ]);

            // questa riga scrive nella tabella ponte
            $post->tags()->attach($faker->randomElements($tags, rand(0, ($tagCount > 5) ? 5 : $tagCount)));
        }
    }
}
