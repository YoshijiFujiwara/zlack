<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReactionIcon extends Model
{
    /**
     * そのアイコンを使ったリアクション
     */
    public function reactions()
    {
        $this->hasMany(Reaction::class, 'icon_id');
    }
}
