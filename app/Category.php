<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    public function articles(){
        return $this->hasMany(Article::class);
    }

}
