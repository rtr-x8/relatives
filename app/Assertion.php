<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assertion extends Model
{
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
