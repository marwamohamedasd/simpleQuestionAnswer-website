<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected  $fillable =['user_id','title','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }



    public function answers(){
        return $this->HasMany(Answer::class);
    }
    public function answers_count(){

       return Answer::where('question_id',$this->id)->count();

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Votes()
    {
        return $this->morphMany(Vote::class, 'Votable');
    }

    public function CheckVotes($user_id){
        return Vote::where('Votable_id', $this->id) ->where('Votable_type', 'App\Models\Question')->where('user_id', $user_id)->first();

    }

    public function tags() {
        return $this->belongsToMany(Tag::class,'question_tags');
    }



}
