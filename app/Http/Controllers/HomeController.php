<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateAdminAccount;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.posts', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(StoreBlogPost $request, Post $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        return redirect()->route('admin.edit', $post->id);
    }

    public function destroy(Request $request, Post $post)
    {
        // return $request->input('post');
        
        if(is_null($post->id)){
            foreach ($request->input('post') as $key => $value) {
                Post::find($key)->delete();
            }    
        } else {
            $post->delete();
        }

        // return redirect()->route('admin.posts');
        return response()->json([
            'result' => 'ok'
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        return view('admin.account', compact('user'));
    }

    public function accountUpdate(UpdateAdminAccount $request)
    {
        $validated = $request->validated();
        $user = Auth::user();
        $user->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.account');
    }

}
