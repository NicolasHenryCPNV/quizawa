<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizzCollection;
use App\Http\Resources\Quizzs;
use App\Quizz;
use App\User;
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
     *          description="OK",
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
     * @OA\POST(
     *      path="/api/quizzes",
     *      tags={"Quizzes"},
     *      description="Create a quizz",
     *      @OA\Parameter(
     *          name="token",
     *          in="header",
     *          description="User authentication",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="title",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="image",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="active",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="user_id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="created",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $quizz = Quizz::create($request->all());

        $quizz->user()->associate($user);
        $quizz->save();
        
        return response()->json($quizz, 201);
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
     *          description="OK",
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
     * @OA\PATCH(
     *      path="/api/quizzes/{quiz}",
     *      tags={"Quizzes"},
     *      description="Update a quizz",
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
     *          description="ID of the quizz to update",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="title",
     *          in="query",
     *          description="Title of the quizz",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          in="query",
     *          description="Description of the quizz",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="image",
     *          in="query",
     *          description="Url of the image",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="active",
     *          in="query",
     *          description="Status of the quizz",
     *          required=false,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="user_id",
     *          in="query",
     *          description="Owner of the quizz",
     *          required=false,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizz $quiz)
    {
        $quiz->fill($request->all());
        $quiz->save();
        return response()->json($quiz, 200);
    }

    /**
     * @OA\DELETE(
     *      path="/api/quizzes/{quiz}",
     *      tags={"Quizzes"},
     *      description="Delete a quizz",
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
     *          description="ID of the quizz to delete",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\Response(
     *          response=204,
     *          description="successful without content",
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
     * Remove the specified resource from storage.
     *
     * @param  Quizz $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizz $quiz)
    {
        $quiz->delete();
        return response()->json("", 204);
    }
}
