<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'parent_id' => 'required',
            'comment' => 'required|String',
        ]);

        if(Auth::user()){
            Comment::create([
                'parent_id' => $request->parent_id,
                'users_id' => $request->user()->id,
                'comment' => $request->comment,
            ]);


        }




        return redirect(route('post.detail', ['id' => $request->parent_id]));
    }
}
