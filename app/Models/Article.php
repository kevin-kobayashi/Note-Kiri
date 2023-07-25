<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shared_link()
    {
        return $this->hasOne('App\Models\SharedLink');
    }


    public static function boot()
    {
        parent::boot();
        // 削除された記事に関連する共有リンクを削除
        static::deleting(function ($article) {
            $article->shared_link()->delete();
        });

    }
}
