<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required',

        ]);
        Answer::create([
            "question_id"=>$request->question_id,
            "content"=>$request->content,
            "user_id"=>1
        ]);

        $question=Question::findOrFail( $request->question_id);
        $question->views-=1;
        $question->save();



        return back();



    }
}
