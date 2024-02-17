<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::select("id", 'name', 'email')
            ->orderBy('id', 'desc')
            ->paginate(3);
        // ->get();
        // dd($users);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect(url('/users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('posts')->find($id);

        if (!$user) {
            return redirect()->route('users.index');
        }
        $posts = $user->posts()->simplePaginate(1);
        return view('users.show', ['user' => $user, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($user = User::find($id)) {
            return view('users.edit', ['user' => $user]);
        } else {
            return redirect(url('/users'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        // if ($user = User::find($id)) {
        //     $user->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //     ]);
        //     return redirect(url('/users'));
        // }

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect(url('/users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect(url('/users'));
    }
}
