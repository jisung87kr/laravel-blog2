<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::paginate(15)->appends(request()->query());
        $posts = Post::orderBy('updated_at', 'desc')->paginate(15);
        return $this->respondCollection($posts);
        // return view('posts.index', compact('posts'));
    }

    protected function respondCollection($posts)
    {
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-post');
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        Gate::authorize('create-post');
        $validated = $request->validated();
        $post = $request->user()->posts()->create($validated);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-post', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, Post $post)
    {
        Gate::authorize('update-post', $post);
        $validated = $request->validated();
        $post->update($validated);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete-post', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
