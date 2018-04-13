<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Tag Seeding...\n";
        $t = new Tag;
        $t->name = "sports";
        $t->save();
        $t = new Tag;
        $t->name = "news";
        $t->save();
        $t = new Tag;
        $t->name = "international";
        $t->save();
        $t = new Tag;
        $t->name = "media";
        $t->save();
        $t = new Tag;
        $t->name = "update";
        $t->save();

        

        echo "Tag Seeded\n";
    }
}
