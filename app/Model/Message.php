<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
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
     * 書いた人
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * メッセージのタイプ
     */
    public function type()
    {
        return $this->belongsTo(MessageType::class, 'type_id');
    }

    /**
     * メッセージのコンテンツ
     */
    public function content()
    {
        return $this->hasOne(MessageContent::class, 'origin_id');
    }

    /**
     * ユーザーとメッセージの中間テーブル的な位置にstarsテーブルがある
     */
    public function stars()
    {
        return $this->belongsToMany(User::class)->using(Star::class);
    }

    /**
     * ユーザーとメッセージの中間テーブル的な位置にreactionsテーブルがある
     */
    public function reactions()
    {
        return $this->belongsToMany(User::class)->using(Reaction::class);
    }

    /**
     * このメッセージが投稿されたチャンネル
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
