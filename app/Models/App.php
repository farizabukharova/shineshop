<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'content','category_id', 'user_id','img',];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersCart(){
        return $this->belongsToMany(User::class)->withPivot('number')->withTimestamps();
    }

    public function BoughtUsers(){
        return $this->belongsToMany(User::class)
            ->withPivot('number',  'status')
            ->withTimestamps();
    }

    public function pays(){
        return $this->hasMany(Pay::class);
    }

}
