<?php

namespace App\Http\Controllers\api;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
/**
     * @OA\Post(
     *     path="/api/home",
     *     summary="Finds Pets by status",
     *     description="Multiple status values can be provided with comma separated string",
     *     tags={"Home"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *         
     *     ),
     *     
     * )

     *@OA\Get(
        *     path="/api/user",
        *     summary="Finds Pets by status",
        *     description="Multiple status values can be provided with comma separated string",
        *     tags={"Home"},
        *     @OA\Parameter(
        *         name="name",
        *         in="query",
        *         description="Status values that needed to be considered for filter",
        *         required=true,
        *         explode=true,
        *         
        *     ),
        *     @OA\Response(
        *         response=200,
        *         description="OK",
        *         @OA\MediaType(
        *             mediaType="application/json",
        *         ),
        *         
        *     ),
        *     
        * )
        *
        *@OA\Post(
            *     path="/login",
            *     summary="Login",
            *     description="Multiple status values can be provided with comma separated string",
            *     tags={"Home"},
            *     @OA\Parameter(
            *         name="email",
            *         in="query",
            *         description="Status values that needed to be considered for filter",
            *         required=true,
            *         explode=true,
            *          @OA\Schema(
            *           type="string"
            *      )
            *         
            *     ),
            *       @OA\Parameter(
            *         
            *         name="password",
            *         in="query",
            *         description="Email values that need to be considered for filter",
            *         required=true,
            *         explode=true,
                    * @OA\Schema(
            *          type="string"
            *      )
            *         
            *     ),
            *   @OA\Response(
            *      response=200,
            *       description="Success",
            *      @OA\MediaType(
            *           mediaType="application/json",
            *      )
            *   ),
            *   @OA\Response(
            *      response=401,
            *       description="Unauthenticated"
            *   ),
            *   @OA\Response(
            *      response=400,
            *      description="Bad Request"
            *   ),
            *   @OA\Response(
            *      response=404,
            *      description="not found"
            *   ),
            *      @OA\Response(
            *          response=403,
            *          description="Forbidden"
            *      )
            *)
            *     
            * )
            */
class HomeController extends Controller
{
    public function index(Request $request){
        return response()->json([
            'name' => $request->input('name'),
            'message' => 'Hello World'
        ]);
    }
    public function store(Request $request)
    {
        return response()->json([
            'name' => $request->input('name'),
            'message' => 'Hello World'
        ]);
    }
    public function login(Request $request){
         //validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt login
        if(!Auth::attempt($attrs))
        {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }
        //return user & token in response
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }
    /**
     * @OA\Post(
     *      path="/api/all-user",
     *      operationId="getUserList",
     *      tags={"Users"},
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function allUsers()
    {
        $lstUser = User::all();
        
        // with(['HinhAnh' => function($query)
        // {
        //     $query -> where('loai_hinh_anh', '=' , 1) -> select('id', 'dia_danh_id', 'post_id', 'loai_hinh_anh', 'hinh_anh') -> orderBy('created_at','desc');
        // }])->get();
        
        return response()->json([
            'data' => $lstUser
        ],200);
    }
}
