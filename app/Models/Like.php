<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table='likes';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Image(){
        return $this->belongsTo(Image::class);
    }
}
