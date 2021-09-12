<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['user_id','content',"question_id"];





      public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

       public function Votes()
    {
        return $this->morphMany(Vote::class, 'Votable');
    }
    public function CheckVotes($user_id){
        return Vote::where('Votable_id', $this->id)->where('user_id', $user_id)->where('Votable_type', 'App\Models\Answer')->first();

    }


}
