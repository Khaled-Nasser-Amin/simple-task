<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function __construct(){
        $this->middleware('role:super_admin')->only(['store','edit','destroy','update']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if(!Auth::attempt(['email'=>$request->email,'password' => $request->password])){
            return response()->json(['error' => 'not found',404]);
        }else{
            $token = auth()->user()->createToken('Token Name')->accessToken;
            return response()->json(['data' => auth()->user(),'token' => $token,200]);
        }
    }

    public function index()
    {
        return response()->json([UserResource::collection(User::paginate(10))]);
    }


    public function store(Request $request)
    {
       $user= User::create($request->all());
        return response()->json(['data' => new UserResource($user),'msg' => 'Created Successfully'],201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
