<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Area;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Cloudinary; 

class PostController extends Controller
{
   
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //getPaginateByLimit()はPost.phpで定義したメソッドです。
    }
    public function create()
    {
        $areas = Area::all(); // 都道府県の一覧を取得 
        return view('posts.create')->with(['areas' => $areas]); //create.blade.phpを表示
    }
    
    public function show(Post $post)
    {
        $post->load('comments.user');
        
        return view('posts.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
     
    }

    public function store(Request $request, Post $post)
    {
        
        $input = $request['post'];
        if($request->file('image')){
                //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];  //追加
        }
        // Auth::id() で現在認証されているユーザーの ID を取得
        $input['user_id'] = Auth::id();
        

        // フォームから送信されたデータを保存
        $post->fill($input)->save();

        // 新しい投稿が作成された後、一覧ページにリダイレクト
        return redirect('/posts/' . $post->id);
        
        
    }
    
    public function addComment(Request $request, Post $post)
    {
    $request->validate([
        'body' => 'required|min:5', // コメントのバリデーションルール
    ]);

    // コメントを保存
    $post->comments()->create([
        'body' => $request->input('body'),
        'user_id' => Auth::id(),
    ]);

    return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post,Comment $comment)
    {
    $areas = Area::all();
       // 編集フォームを表示するためのビューを返す
    return view('posts.edit', compact('post', 'areas'));
    return view('comments.edit', compact('comment'));
    }
 
    public function update(Request $request, Post $post, Comment $comment)
    {

    $post->update([
        'body' => $request->input('post.body'),
        'area_id' => $request->input('post.area_id'),
        
        // 他に必要な更新項目を追加
    
        
    ]);
   
 
    
    $comment->update([
        'body' => $request->input('body'),
    ]);
    
    return redirect(route('posts.show', ['post' => $post->id])); 
    return redirect('/posts/' . $comment->post_id);
 
    
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }

    
}
