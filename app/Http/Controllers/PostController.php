<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::query()->orderBy("updated_at", "DESC")->paginate(3);
        return view('posts.index', [
            "posts" => $posts,

        ]);

    }
    public function create()
    {
        return view("posts.create", []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect(route('posts.index'));
    }

    public function show($id) {

        $post = Post::findOrFail($id);

        return view('posts.show', [
            "post" => $post,
        ]);
    }


}
