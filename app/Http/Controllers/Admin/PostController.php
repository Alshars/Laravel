<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Mail\PostUpdated;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::query();
        return view("admin.posts.index", [
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create", []);
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

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        return view('admin.posts.show', [
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);



        return view("admin.posts.create", [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {


        $post = Post::findOrFail($id);

        $data = $request->validated();

        $post->update($data);

        Mail::to($post)->send(new PostUpdated());

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route("admin.posts.index"));
    }



}
