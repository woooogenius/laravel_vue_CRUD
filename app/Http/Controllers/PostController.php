<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Welcome', ['posts' => $posts]);
    }

    public function create()
    {
        $boards = Board::all();

        return Inertia::render('Posts/Create', [
            'boards' => $boards
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'board_id'=> 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', ['post' => $post]);
    }

    public function detail(Post $post)
    {
        return Inertia::render('Posts/PostDetail', ['post' => $post]);
    }



    public function update(Request $request, Post $post)
        //$request와 $post 두 개의 매개변수를 가집니다. $request는 HTTP 요청 객체이고, $post는 업데이트할 게시물 객체입니다. Laravel은 자동으로 주어진 ID에 해당하는 게시물을 찾아 $post에 할당합니다.
    {
        $request->validate([ //메서드를 사용하여 요청된 데이터의 유효성을 검사합니다. 여기서는 게시물의 제목과 내용이 필수 필드이며, 제목이나 내용이 없는 경우 유효성 검사 실패로 처리됩니다.
            'title' => 'required',
            'content' => 'required',
            // 다른 필드들에 대한 유효성 검사 규칙 추가 가능
        ]);

        //유효성 검사를 통과한 경우, $request->all()을 사용하여 요청된 모든 데이터를 가져와 $post->update() 메서드를 호출하여 해당 게시물을 업데이트합니다.
        //이는 Mass Assignment를 사용하여 간편하게 모델의 속성을 업데이트하는 방법입니다.
        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($postId) //URI에서 받아온 게시물의 ID를 나타냅니다. 이 ID는 사용자가 삭제하고자 하는 게시물을 식별하는 데 사용됩니다.
    {

        $post = Post::query()->findOrFail($postId); //주어진 ID에 해당하는 게시물을 검색하고, 해당하는 게시물이 없는 경우 ModelNotFoundException을 발생시킵니다.
        $post->delete(); //조회된 게시물이 있다면, delete() 메소드를 호출하여 해당 게시물을 데이터베이스에서 삭제합니다.
        return redirect()->route('posts.index');


    }
}
