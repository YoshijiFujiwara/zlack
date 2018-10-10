<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Reaction extends Pivot
{
    /**
     * このリアクションのアイコン
     */
    public function icon()
    {
        return $this->belongsTo(ReactionIcon::class, 'icon_id');
    }
}
