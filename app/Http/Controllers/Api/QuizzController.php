<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizzCollection;
use App\Http\Resources\Quizzs;
use App\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new QuizzCollection(Quizz::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quizz $quiz)
    {
        return new Quizzs($quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizz $quiz)
    {
        //
    }
}
