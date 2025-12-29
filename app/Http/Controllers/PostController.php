<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $postsFromDB = Post::all();
       /* dd($postsFromDB);
        $allPosts = [
            ["id" => 1, "title" => "title 1", "posted_by" => "Content 1", "created_at" => "December"],
            ["id" => 2, "title" => "title 2", "posted_by" => "Content 2", "created_at" => "November"],
            ["id" => 3, "title" => "title 3", "posted_by" => "Content 3", "created_at" => "October"],
            ["id" => 4, "title" => "title 4", "posted_by" => "Content 4", "created_at" => "September"],

        ];*/
        return view("posts.index", ["posts" => $postsFromDB]);
    }

    public function create(){
        $Users = User::all();

        return  view("posts.create", ["users" => $Users]);
    }

    public function store(){
request()->validate([
    "title" => ["required", "min:3"],
    "description" => ["required", "min:10"],
    "creator" => ["required", "exists:users,id"],
]);
        $data = request()->all();
        $title= request()->title;
        $description= request()->description;
        $creator= request()->creator;

        // Validate the request...
        Post::create(
            ["title" => $title,
            "description" => $description,
                "user_id" => $creator,]
        );
        return to_route("posts.index");

    }

    public function edit(Post $post){
        $Users = User::all();

        return view("posts.edit", ["users" => $Users, 'post' => $post]);
    }

    public function update($postID){


        //$data = request()->all();
        $title= request()->title;
        $description= request()->description;
        $creater= request()->creater;

        $singleDataFromDB = Post::find($postID);
        $singleDataFromDB->update([
            "title" => $title,
            "description" => $description,
            "user_id" => $creater,
        ]);

        return to_route("posts.show", $postID);

    }
public function destroy(Post $post){
        $post->delete();
        return to_route("posts.index");
}
    public function show(Post $post){
       //  $singlePost = ["id" => 1, "title" => "Laravel Framework", "description" => "Laravel provides a complete
        // ecosystem for web artisans", "created-at" => "December"];
        //$SinglePostFromDB = Post::findOrFail($postId);

        return  view("posts.show", ["post" => $post]);}
    }


