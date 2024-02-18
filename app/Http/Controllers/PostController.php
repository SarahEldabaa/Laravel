<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $AunthenticatedUser = Auth::user();
        $users = User::all();

        return view('posts.create', [
            'users' => $users,
            'AunthenticatedUser' => $AunthenticatedUser
        ]);
    }

    public function store(Request $request)
    {
        if ($request->file('image')->isValid() && $request->hasFile('image')) {
            $path = $request->file('image')->store('post', 'public');
        }
        $data = $request->all();
        // dd($fileName);
        $data['slug'] = Str::slug($data['title']);
        $data['image'] = $path;

        $post = Post::create($data);

        event(new PostCreated($post));
        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        if ($post = Post::find($id)) {
            return view('posts.show', ['post' => $post]);
        } else {
            return redirect()->route('users.index');
        }
    }

    public function edit(string $id)
    {
        $AunthenticatedUser = Auth::user();
        $users = User::all();
        
        // if ($post = Post::find($id)) {
        //     return view('posts.edit', 
        //     [
        //         'post' => $post, 
        //         'users' => $users,
        //         'AunthenticatedUser' => $AunthenticatedUser
        //     ]);
        // } else {
        //     return redirect(url('/posts'));
        // }

        $post = Post::findOrFail($id);
        $user_id = $post->user_id;
        if ($AunthenticatedUser->id != $user_id) {
            return redirect()->route('posts.index')->with('message', 'You are not allowed to edit this post');;
        } else {
            return view('posts.edit', [
                'post' => $post,
                'user' => $users,
                'AunthenticatedUser' => $AunthenticatedUser
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        Post::findOrFail($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'user_id' => $request->user_id,
        ]);
        return redirect(url('/posts'));
    }

    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();
        return redirect(url('/posts'));
    }
}
