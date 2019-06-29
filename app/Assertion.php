<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\AssertionScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assertion extends Model
{
    use SoftDeletes;

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
        'title', 'body', 'provider', 'user_id',
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
