<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =  ['user_id','image_id','content'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Image(){
        return $this->belongsTo(Image::class);
    }

}
