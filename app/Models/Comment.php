<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'app_id', 'user_id'];

    public function app(){
        return $this->belongsTo(App::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
