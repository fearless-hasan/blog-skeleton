<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Tag;
use App\Facker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Post Seeding... ";
        for ($i=0; $i < 100; $i++) { 
        $faker = Faker\Factory::create();
		$u = User::find($faker->numberBetween(1,5));
		$p = new Post;
		$p->title = $faker->word;
		$p->body = $faker->paragraph;
		$p->publication_status = 1;
		$p->user_id = $u->id;
		$p->save();
		$t = Tag::find($faker->numberBetween(1,5));
		$p->tags()->attach($t);

		$u = User::find($faker->numberBetween(1,5));
		$p = Post::create([
			'title' => $faker->word,
			'body' => $faker->paragraph,			
			'publication_status' => 1,			
			'user_id' => $u->id			
		]);		
		$t = Tag::find($faker->numberBetween(1,5));
		$p->tags()->attach($t);
		echo " .";

        }
        echo "Post Seeded\n";
    }
}