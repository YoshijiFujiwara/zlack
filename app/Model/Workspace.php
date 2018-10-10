<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Workspace extends Model
{
    protected $guarded = [];

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
        return $this->belongsToMany(User::class, 'user_workspace', 'workspace_id', 'user_id');
    }

    /**
     * 所属するチャンネル
     */
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
