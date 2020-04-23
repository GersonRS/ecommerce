<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display the specified User.
     *
     * @param null $relationships
     * @return UserResource
     */
    public function current($relationships = null)
    {
        $user = null;
        if (Auth::check()) {
            $user = User::with($relationships ? explode('-', $relationships) : [])->find(Auth::user()->id);
        }
        return new UserResource($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @param null $relationships
     * @return UserCollection
     */
    public function index($relationships = null)
    {
        $users = User::with($relationships ? explode('-', $relationships) : [])->get();
        return new UserCollection($users);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Please fill out the :attribute.',
            'email.email' => 'Please fill in valid email address.',
            'email.required' => 'Please fill out the :attribute.',
            'password.required' => ':attribute is required.',
            'password.confirmed' => ':attribute does not equals.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
                'status' => false], 422);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        /**Take note of this: Your user authentication access token is generated here **/
        $token = $user->createToken('MyApp')->accessToken;

        return (new UserResource($user))->additional(['token' => $token, 'message' => 'Register success', 'status' => true])->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResource
     */
    public function show($id, $relationships = null)
    {
        $user = User::with($relationships ? explode('-', $relationships) : [])->find($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => ['message' => 'User not found. Consider adding it!']
            ], 404);
        }

//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|confirmed',
//            'password_confirmation' => 'required'
//        ],[
//            'name.required' => 'Please fill out the :attribute.',
//            'email.email' => 'Please fill in valid email address.',
//            'email.required' => 'Please fill out the :attribute.',
//            'password.required' => ':attribute is required.',
//            'password.confirmed' => ':attribute does not equals.',
//        ]);
//
//        if($validator->fails()){
//            return response()->json([
//                'message' => 'Validation errors',
//                'errors' =>  $validator->errors(),
//                'status' => false], 422);
//        }
        $user->fill($request->all());
        $user->save();

        return (new UserResource($user))->additional(['message' => 'Update success', 'status' => true])->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'User not found. Consider adding it!'
                ]], 404);
        }
        $user->delete();
        return (new UserResource($user))->additional(['message' => 'Delete success', 'status' => true])->response()->setStatusCode(200);
    }
}
