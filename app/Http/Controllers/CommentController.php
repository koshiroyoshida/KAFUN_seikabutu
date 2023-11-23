<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment; // Comment モデルをインポート
use App\Models\Post; // Post モデルをインポート
use Auth;

class CommentController extends Controller
{
   

  
    
        public function store(Request $request, Post $post,Comment $comment)
    {
        $input['user_id']=Auth::id();
        $input['post_id']=$post->id;
        $input['comment']=$request['comment'];
        
        // コメントを保存
        $comment->fill($input)->save();

        return redirect('/posts/' . $post->id);
    }
    
}
