<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();
    }

    public function show(User $user)
    {
        return $user->load('address');
    }

    public function getUserEmails()
    {
        return User::select('email')->get();
    }
    
    public function update(Request $request, UpdateUserRequest $user)
    {
        $request->validated()->safe()->except(['password', 'sex']);

        return $user;
    }

    public function destroy(User $user)
    {
        return response()->json([
            'status' => 204
         ], 204);
    }
}
