<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @mixin \Eloquent
 * @property-read \App\Post $post
 * @property-read \App\User $user
 */
class Comment extends Model
{

    /**
     * 投稿したユーザーを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 対象のPostを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function post()
    {
        return $this->belongsTo(Post::class);
    }
}
