<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MessageType extends Model
{
    /**
     * このタイプのメッセージ一覧
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'type_id');
    }
}
