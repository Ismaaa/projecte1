<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

    protected $table = 'publications';

    protected $fillable = [
        'text', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
