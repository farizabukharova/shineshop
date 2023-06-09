<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_kz','name_ru','name_en',];

    public function apps(){
        return $this->hasMany(App::class);
    }


}
