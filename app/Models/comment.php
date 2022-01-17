<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\postcomment;
class comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'firstname','lastname','comment','news','newsText','thumbnail','title','email',
    ];
    public function postcomments(){
        return $this->hasMany(postcomment::class)->orderBy('id', 'DESC');
    
    }
    public function users(){
        return $this->hasMany(user::class,'id');
    
    }
}
