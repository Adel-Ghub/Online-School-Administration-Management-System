<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

/*        // $this->middleware('auth.user');//This will apply the middleware to all actions in the controller.
 */
    }

    public function index()
    {
        $users = $this->userRepository->all();
        foreach($users as $user) {
            $user->token = JWTAuth::fromUser($user);//to show the token for each user
        }
        return response()->json($users, 200);


        // return view('users.index', compact('users'));
    }

     public function store(Request $request)
    {
        $this->middleware('auth:api');
        $user = $this->userRepository->create($request);
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
        $this->middleware('auth:api');

        $this->userRepository->delete($id);

        return response()->json('user deleted successfully.');
    }

    public function login(Request $request, UserRepository $userRepository) {
        $user = $this->userRepository->login($request->all());
        if(!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = JWTAuth::fromUser($user);
        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function register(Request $request, UserRepository $userRepository)
    {
/*         //$this->middleware('auth.user');
 */        $this->middleware('auth:api');

        return $userRepository->create($request);
    }
    
    
    
}

