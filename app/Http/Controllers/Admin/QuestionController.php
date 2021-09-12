<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class QuestionController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['index', 'show']]);
    // }
    public function index()
    {
        // $questions = Question::latest()->paginate(5);

        // return view('questions.index',compact('questions'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);


        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index', compact('questions'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Question::create($request->all());

           $question=new Question();

        $question->create($request->only('user_id','title', 'body'));

        return redirect()->route('questions.index')
                        ->with('successn','question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question)

    {
        $question->increment('views');


        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question)
    {
        $this->authorize("update", $question);
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Question $question)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')
                        ->with('success','question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        $question->delete();

        return redirect()->route('questions.index')
                        ->with('success','question deleted successfully');
    }
}
