<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('TutsForWeb')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if(Auth::attempt($credentials)){ 
            $user = Auth::user(); 
            $success['status']=true;
            $success['id']=$user->id;
            $success['name']=$user->name;
            $success['email']=$user->email;
            $success['role']=$user->role;
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json( $success, $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user(); 
        return response()->json(['status' => $user], $this-> successStatus); 

       
    }
}
