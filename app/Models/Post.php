<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'body','area_id', 'user_id','image_url',  //追加
        ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
         return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);//Post モデルに user_id を設定するためのリレーションを追加
    }
    public function comments()
    {
        return $this->hasMany(Comment::class); //、hasMany メソッドを使用して Comment::class と関連付
        
    }
    
     public function area()
    {
    return $this->belongsTo(Area::class);
    }
    public static function booted()
    {
        static::deleted(function ($post) {
            $post->comments()->delete();
        });
    }
}
