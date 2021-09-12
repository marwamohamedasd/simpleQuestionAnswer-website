<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer=Answer ::findOrFail($request->answer_id);
        if($answer->CheckVotes(1)){
            Vote::where('Votable_id', $answer->id)->where('user_id', 1)->delete();
        }else{
          // $input = $request->all();
        // $input['user_id'] = auth()->user()->id;
        $input['user_id'] = 1;

        $input['score']  = 1;




        $answer->votes()->create($input);
        }

        return back();

    }



public function questionvotestore(Request $request){
    $question=Question ::findOrFail($request->question_id);
        if($question->CheckVotes(1)){
            Vote::where('Votable_id', $question->id)->where('user_id', 1)->delete();
        }else{
          // $input = $request->all();
        // $input['user_id'] = auth()->user()->id;
        $input['user_id'] = 1;

        $input['score']  = 1;




        $question->votes()->create($input);
        }

        return back();

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
