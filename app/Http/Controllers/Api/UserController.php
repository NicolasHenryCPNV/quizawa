<?php

namespace App\Http\Controllers\Api;

use App\Classroom;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @OA\Tag(
 *      name="Users",
 *      description="Users APIs",
 * )
 */

class UserController extends Controller
{
    /**
     * @OA\GET(
     *      path="/api/users",
     *      tags={"Users"},
     *      description="List of users",
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
        return new UserCollection(User::all());
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
     *      path="/api/users",
     *      tags={"Users"},
     *      description="Store an user",
     *      @OA\Parameter(
     *          name="pseudo",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="firstname",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="lastname",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="stored",
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
     *          response=403,
     *          description="pseudo or email already exists",
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
        // Required parameters
        if (!$request->email || !$request->password || !$request->pseudo || !$request->firstname || !$request->lastname) {
            return response()->json('Paramètres manquants ou incorrects', 400);
        }

        // User already exists
        if (User::where('pseudo', $request->pseudo)->first() || User::where('email', $request->email)->first()) {
            return response()->json("Pseudo ou email déjà existant", 403);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'pseudo' => $request->pseudo,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'admin' => 0,
            'creator' => 0,
            'api_token' => Str::random(80),
            'classroom_id' => env('CLASSROOM_GUEST'),
        ]);

        echo $user;
        die();

        return response()->json($user->api_token, 201);
    }

    /**
     * @OA\GET(
     *      path="/api/users/{user}",
     *      tags={"Users"},
     *      description="Show one user",
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
     *          name="user",
     *          in="path",
     *          description="ID of the user to return",
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
     *      )
     * )
     */

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

    /**
     * @OA\POST(
     *      path="/api/users/login",
     *      tags={"Users"},
     *      description="Login with the user account",
     *      @OA\Parameter(
     *          name="pseudo",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="found, authentication success",
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
     *          response=401,
     *          description="not found, authentication fail",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */

    /**
     * Find an user in the database and check credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Required parameters
        if (!$request->pseudo || !$request->password) {
            return response()->json('Paramètres manquants ou incorrects', 400);
        }

        $user = User::where('pseudo', $request->pseudo)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json($user->api_token, 201);
        } else {
            return response()->json('Vos identifiants ne sont pas corrects', 401);
        }
    }
}
