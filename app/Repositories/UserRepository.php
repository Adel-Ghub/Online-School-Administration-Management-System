<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Repositories\Hash;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;


class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        $token = JWTAuth::fromUser($user);
        return response()->json(['user'=>$user,'token' => $token,201]);
    }
    
    public function update(array $data, $id)
    {
        $user = $this->user->find($id);
        return $user->update($data);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function delete($id)
    {
        return $this->user->destroy($id);
    }

    public function register($request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    else{
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return $user;
    }
}

    public function login($request) {
        $user = User::where('email', $request->input('email'))->first();
        if(!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = JWTAuth::fromUser($user);
        return $token;
    }
}
