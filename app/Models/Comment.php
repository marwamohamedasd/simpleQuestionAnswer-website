<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    use HasFactory;
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'content'];


    public function commentable()
{
return $this->morphTo("commentable_type",
 'commentable_id');
}


protected $guarded = [];

public function user()
{
    return $this->belongsTo(User::class);
}

// public function replies()
// {
//     return $this->hasMany(Comment::class, 'parent_id');
// }


}
