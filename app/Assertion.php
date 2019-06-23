<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\AssertionScope;

class Assertion extends Model
{
    /**
     * モデルの「初期起動」メソッド
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new AssertionScope);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'provider', 'user_id',
    ];

    /**
     * Belongs to User model
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
