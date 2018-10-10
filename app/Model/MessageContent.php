<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MessageContent extends Model
{
    /**
     * 元のメッセージ
     */
    public function originMessage()
    {
        return $this->belongsTo(Message::class, 'origin_id');
    }
}
