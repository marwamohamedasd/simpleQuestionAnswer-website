<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function store(Request $request)
    {
        // $comment = new Comment;

        // $comment->comment = $request->comment;

        // $comment->user()->associate($request->user());

        // $question = Question::find($request->question_id);

        // $question->comments()->save($comment);

        // return back();

        $request->validate([
            'content'=>'required',
        ]);

        $input = $request->all();
        // $input['user_id'] = auth()->user()->id;
        $input['user_id'] = 1;

        $answer = Answer::findOrFail($request->answer_id);
        $answer->comments()->create($input);
// $comment = new Comment($attributes);
// $post->comments()->save($comment).

        // dd( $input['user_id']);


    

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $question =Question::find($request->get('question_id'));

        $question->comments()->save($reply);

        return back();
    }
}
