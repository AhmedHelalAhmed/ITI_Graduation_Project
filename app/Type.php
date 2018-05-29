<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
