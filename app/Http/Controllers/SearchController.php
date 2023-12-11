<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Area;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, Area $area)
    {
        $keyword = $request->input('keyword');
        $area_id = $request->input('area_id');
        $query = Post::query();
        // 例: 'body' カラムに対して部分一致検索を行う
       // $posts = Post::where('body', 'like', '%' . $keyword . '%')->get();

        if(!empty($keyword)&& $area_id != null) {
            $query->where('body', 'LIKE', "%{$keyword}%", 'AND','area_id','=', $area_id);
        } elseif(!empty($keyword) && $area_id == null) {
            $query->where('body', 'LIKE', "%{$keyword}%");   
        } elseif (empty($keyword) && $area_id != null){
            $query->where('area_id','=', $area_id);
        }

        $posts = $query->get();
        return view('posts.search', compact('posts', 'keyword','area_id'))->with(['areas'=> $area->get()]);
    }
    
}


