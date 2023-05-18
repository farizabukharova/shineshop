<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'app_user';
    protected $fillable = ['post_id', 'app_id', 'number', 'status'];

    public function app(){
        return $this->belongsTo(App::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
