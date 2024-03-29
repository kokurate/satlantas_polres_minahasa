<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Information extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id']; 
    protected $table = 'informations';

     // 1 informasi dimiliki 1 user
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }


}
