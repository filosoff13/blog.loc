<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $users = User::with('posts', 'comments')->get();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('first_name') ?? '';
        $user->gender = $request->get('gender');
        $user->birthday = $request->get('birthday');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->remember_token = Str::random(10);

        $result = $user->save();

        return $result ? new UserResource($user) : ['error'];
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return UserResource|array
     */
    public function destroy(User $user)
    {
        $result = $user->delete();

        return $result ? new UserResource($user) : ['error'];
    }
}
