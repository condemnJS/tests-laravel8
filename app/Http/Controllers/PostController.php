<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('createPost');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:1000'
        ])->validate();
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('home')->with('message', 'Пост успешно создан');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('message', 'Пост успешно удален');
    }
}
