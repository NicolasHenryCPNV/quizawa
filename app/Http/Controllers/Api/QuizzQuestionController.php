<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizzQuestionCollection;
use App\Question;
use App\Quizz;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *      name="Quizz/questions",
 *      description="Questions of a quizz APIs",
 * )
 */
class QuizzQuestionController extends Controller
{
    /**
     * @OA\GET(
     *      path="/api/quizzes/{quiz}/questions",
     *      tags={"Quizz/questions"},
     *      description="List of questions for a quizz",
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
     *          name="quiz",
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
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="parameters are missing",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found",
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
    public function index(Quizz $quiz)
    {
        // Required parameters
        if (!$quiz) {
            return response()->json('Paramètres manquants ou incorrects', 400);
        }
        
        $quizz_collection = new QuizzQuestionCollection(Question::all()->where('quizz_id', $quiz->id));

        if($quizz_collection->count() == 0) {
            return response()->json('Quizz pas trouvé', 404);
        }

        return $quizz_collection;
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
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Quizz $quiz, Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizz $quiz, Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizz $quiz, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizz $quiz, Question $question)
    {
        //
    }
}
