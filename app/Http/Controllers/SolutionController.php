<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolutionRequest;
use App\Question;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
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
    public function store(SolutionRequest $request) {

        $solution = new Solution;
        $solution->body = $request->body;
        $solution->user_id = Auth::user()->id;
        $solution->question_id = $request->question_id;
        $solution->save();
        return redirect()->route('questions.show', $solution->question_id);
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
        $question_id = Solution::find($id)->question->id;
        Solution::destroy($id);
        return redirect()->route('questions.show', $question_id);
    }

    public static function increaseVote($id, $question_id){
        $solution = Solution::find($id);
        $solution->votes = $solution->votes + 1;
        $solution->save();
        return route('questions.show', $question_id);
    }

    public static function decreaseVote($id, $question_id){
        $solution = Solution::find($id);
        $solution->votes = $solution->votes - 1;
        $solution->save();
        return route('questions.show', $question_id);
    }

}
