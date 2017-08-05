<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Solution;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $questions = Question::paginate(10);
        return view('questions.index')->withQuestions($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request) {
        $question = new Question;
        $question->title = $request->title;
        $question->body = $request->body;
        $question->user_id = Auth::user()->id;
        $question->save();
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $question = Question::find($id);
        $question->view = $question->view + 1;
        $question->save();
//        $solutions = Solution::all();
        $solutions = Solution::where('question_id', '=', $question->id)->get();
//        dd($solutions);
        return view('questions.show')->withQuestion($question)->withSolutions($solutions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $question = Question::find($id);
        return view('questions.edit')->withQuestion($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id) {
        $question = Question::find($id);
        $question->title = $request->title;
        $question->body = $request->body;
        $question->save();
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Question::destroy($id);
        return redirect()->route('questions.index');
    }
}
