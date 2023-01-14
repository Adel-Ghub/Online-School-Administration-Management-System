<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return response()->json($users, 200);


        // return view('users.index', compact('users'));
    }

     public function store(Request $request)
    {
        $user = $this->userRepository->create($request->all());
        return response()->json([
            'message' => 'Successfully created new user',$user]);
        //return redirect()->route('users.index')->with('success', 'user created successfully.');
    } 
  /*   public function store(Request $request)(this is much organized than the above store)
    {
        $data = $request->all();

        // Process data and create new user
        $user = $this->userRepository->create($data);

        return response()->json([
            'message' => 'Successfully created new user',
            'data' => $user
        ], 201);
    } */

    public function show($id)
    {
        $user = $this->userRepository->find($id);
return response()->json($user);
       // return view('users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->update($request->all(), $id);

        return response()->json(['user updated successfully.']);
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return response()->json('user deleted successfully.');
    }
}

