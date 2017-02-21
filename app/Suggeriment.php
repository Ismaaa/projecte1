<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggeriment extends Model
{
    protected $table = 'suggeriments';

    protected $fillable = [
        'text', 'user_id', 'type'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
