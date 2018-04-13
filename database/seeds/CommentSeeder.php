<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Comment Seeding... ";

        for ($i=0; $i < 300; $i++) { 
        $faker = Faker\Factory::create();
        $u = User::find($faker->numberBetween(1,5));
        $c = new Comment;
        $c->comment = $faker->sentence;
        $c->publication_status = 1;
        $c->user_id= $u->id;
        $c->post_id= $faker->numberBetween(1,100);
        $c->save();

        $u = User::find($faker->numberBetween(1,5));
        Comment::create([
            'comment' => $faker->sentence,            
            'publication_status' => 1,           
            'user_id' => $u->id,        
            'post_id' => $faker->numberBetween(1,200)       
        ]);
        echo " .";

        }
        echo "Comment Seeded\n";
    }
}
