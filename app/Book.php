<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [ 'genre' , 'thumbnail', 'title', 'slug', 'author', 'publisher', 'price', 'blurb', 'stock'];

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
