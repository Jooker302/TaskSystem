<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            // dd($user);
            if($user->user_status == 'blocked'){
                return response()->json([
                    'status' => false,
                    'message' => 'User is Deactivated by Admin',
                ], 500);
            }

            if($user->status != 'user'){
                return response()->json([
                    'status' => false,
                    'message' => 'User\'s Role is not User',
                ], 500);
            }

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user_id' => $user->id
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        if ($request->user()) {
            $user = auth()->user();
            $user->tokens()->delete();
        }

        return response()->json(['message' => 'You are Logout Successfully'], 200);
    }

    public function profile(Request $request){
        $user = User::find($request->id);
        return response()->json(['data' => $user], 200);
    }

    public function change_image(Request $request){
        $user = User::find($request->user_id);
        // $user->image =
        $imageData = $request->get('image');
        // $userId = Auth::user()->id;
        $filename = time().'.jpg';
        $userPublicPath = 'assets/users/';
        $path = $userPublicPath . $filename;
        File::put($path, base64_decode($imageData));
        $user->image = 'https://etradeverse.com/test/TaskSystem/public/'.$path;
        // $user->image = 'test';
        $user->save();

        return response()->json(['message' => 'success'], 200);
    }
}
