<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';

    protected $fillable = [
        'user_id',
        'image_path',
        'description'

    ];

    public function Comment(){
        return $this->hasMany(Comment::class);//>orderBy('id','desc');
        
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Like(){
        return $this->belongsTo(Like::class);
    }
}
