<?php

namespace App;

use App\Model\Channel;
use App\Model\Message;
use App\Model\Reaction;
use App\Model\Star;
use App\Model\UserWorkspace;
use App\Model\Workspace;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * ワークスペース
     * Many to Many
     */
    public function workspaces()
    {
        return $this->belongsToMany(Workspace::class, 'user_workspace', 'user_id', 'workspace_id');
    }

    /**
     * チャンネル
     * Many to Many
     */
    public function channels()
    {
        return $this->belongsToMany(Channel::class, 'channel_user', 'user_id', 'channel_id');
    }

    /**
     * ユーザーが書いたメッセージ
     * one to many
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * ユーザーとメッセージの中間テーブル的な位置にstarsテーブルがある
     */
    public function stars()
    {
        return $this->belongsToMany(Message::class)->using(Star::class);
    }

    /**
     * ユーザーとメッセージの中間テーブル的な位置にreactionsテーブルがある
     */
    public function reactions()
    {
        return $this->belongsToMany(Message::class, 'reactions', 'user_id', 'message_id');
    }
}
