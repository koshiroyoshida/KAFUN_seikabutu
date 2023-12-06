<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment; // Comment モデルをインポート
use App\Models\Post; // Post モデルをインポート
use Auth;

class CommentController extends Controller
{
   
public function index()
    {
    $comments = Comment::all();
    return view('comments.index', compact('comments'));
    }
  
    
        public function store(Request $request, Post $post,Comment $comment)
    {
        $input['user_id']=Auth::id();
        $input['post_id']=$post->id;
        $input['comment']=$request['comment'];
        
        // コメントを保存
        $comment->fill($input)->save();

        return redirect('/posts/' . $post->id);
    }
   
    public function edit(Comment $comment)
    {
    return view('comments.edit', compact('comment'));
    }
   
    
    public function update(Request $request, Comment $comment)
    {

    $comment->update([
        'body' => $request->input('body'),
        // 他に必要な更新項目を追加
    ]);

    return redirect('/posts/' . $comment->post_id);
    }
    
    public function delete(Comment $comment)
    {
    $comment->delete();

    return redirect()->back(); // 前のページにリダイレクト
    }
    
}
