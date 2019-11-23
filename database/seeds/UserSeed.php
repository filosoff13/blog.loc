<?php

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function($u) {
            $u->posts()
                ->saveMany(factory(Post::class, 5)->make() )
                ->each(function($p){
                    $p->comments()
                        ->saveMany(factory(Comment::class, 10)->make());
                });
        });
    }
}
