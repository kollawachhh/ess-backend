<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
 
class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', [
            'except' => ['remove_user']
        ]);
    }
    
    public function create_user(Request $request){
        $user = [
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'firstname' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'image' => $request->input('image'),
                'role' => $request->input('role'),
                'login_time' => '2021-12-01 00:00:00',
        ];
        $user_create = User::create($user);
        return "success";
    }
 
    public function remove_user($id){
        $user = User::findOrFail($id);
        $user->delete();
 
        return "remove success";
    }
 
    public function get_user($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }
 
    public function all_users(){
        $users = DB::table('users')
                ->where('role', '!=', 'Admin')
                ->get();
        return response()->json($users);
    }

    public function update_firstname(Request $request, $id){
        $user = User::findOrFail($id);
        $user->firstname = $request->input('firstname');
        $user->save();
        
        return "update success";
    }

    public function update_surname(Request $request, $id){
        $user = User::findOrFail($id);
        $user->surname = $request->input('surname');
        $user->save();
        
        return "update success";
    }

    public function update_role(Request $request, $id){
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();
        
        return "update success";
    }

    public function ban_user(Request $request, $id){
        $user = User::findOrFail($id);
        $user->status = $request->input('status');
        $user->save();
        
        return "update success";
    }
}