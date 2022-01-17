<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\comment;





class postcomment extends Model
{
    use HasFactory;

    protected $table = 'postcomments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'commented','user_id','comment_id','firstname','lastname','thumbnail',
    ];
    public function comments(){
        return $this->belongsTo(comment::class);
    }

}
