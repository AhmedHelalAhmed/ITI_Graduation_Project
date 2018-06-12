<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'cover',
        'body',
        'attachment',
        'type_id',
        'user_id',
        'category_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->hasOne(Type::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vote(){
        return $this->belongsTo(Vote::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
