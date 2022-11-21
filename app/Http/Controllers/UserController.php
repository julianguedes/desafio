<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        return User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'sex'=>$request->sex,
            'age'=>$request->age
        ]);
    }

    public function show(User $user)
    {
        return $user->load('address');
    }

    public function getUserEmails()
    {
        return User::select('email')->get();
    }
    
    public function update(Request $request, User $user)
    {
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age
        ]);
        return $user;
    }

    public function destroy(User $user)
    {
        return response()->json([
            'status' => 204
         ], 204);
    }
}
