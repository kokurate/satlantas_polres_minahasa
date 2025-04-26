<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kritik_saran extends Model
{
    use HasFactory;
    use Sluggable;

    
    protected $guarded = ['id']; 
    protected $table = 'Kritik_saran';

     // 1 Kritik saran dimiliki 1 user
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
