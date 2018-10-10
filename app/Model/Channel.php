<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Channel extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Str::orderedUuid();
        });
    }

    /**
     * 所属するユーザー
     * many to many
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'channel_user', 'channel_id', 'user_id');
    }

    /**
     * 所属するワークスペース
     */
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    /**
     * このチャンネルに投稿されたメッセージ
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
