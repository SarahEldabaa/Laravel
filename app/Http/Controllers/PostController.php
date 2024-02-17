<?php

namespace App\Http\Controllers;

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
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        Post::create($data);
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
        $users = User::all();
        if ($post = Post::find($id)) {
            return view('posts.edit', ['post' => $post, 'users' => $users]);
        } else {
            return redirect(url('/posts'));
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
