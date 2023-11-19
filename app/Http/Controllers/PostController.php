<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Area;
use Auth;

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
        return view('posts.create')->with(['areas' => $areas]);
    }
    
    public function show(Post $post)
    {
    return view('posts.show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function store(Request $request, Post $post)
    {
        $input = $request['post'];

        // Auth::id() で現在認証されているユーザーの ID を取得
        $input['user_id'] = Auth::id();

        // フォームから送信されたデータを保存
        $post->fill($input)->save();

        // 新しい投稿が作成された後、一覧ページにリダイレクト
        return redirect('/posts');
        
        
    }
    
    
}
