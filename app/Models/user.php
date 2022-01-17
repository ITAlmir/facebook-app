<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname','lastname','age','password','email','thumbnail',
    ];

    public function comment(){
        return $this->belongsTo(comment::class,'user_id');
    
    }
}
