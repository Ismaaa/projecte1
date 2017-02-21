<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{

    protected $table = 'pdfs';

    protected $fillable = [
        'accio', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
