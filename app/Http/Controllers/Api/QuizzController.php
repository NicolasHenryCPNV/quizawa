<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizzCollection;
use App\Http\Resources\Quizzs;
use App\Quizz;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *      name="Quizzes",
 *      description="Quizzes APIs",
 * )
 */

class QuizzController extends Controller
{
    /**
     * @OA\GET(
     *      path="/api/quizzes",
     *      tags={"Quizzes"},
     *      description="List of quizzes",
     *      @OA\Parameter(
     *          name="api_token",
     *          in="query",
     *          description="User authentication",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */

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
     * @OA\GET(
     *      path="/api/quizzes/{quizz}",
     *      tags={"Quizzes"},
     *      description="Show one quizz",
     *      @OA\Parameter(
     *          name="api_token",
     *          in="query",
     *          description="User authentication",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="quizz",
     *          in="path",
     *          description="ID of the quizz to return",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */

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
