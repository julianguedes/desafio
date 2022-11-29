<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        User::all()->orderBy('name')->where('age', '>', 20);
    }

    public function store(StoreUserRequest $request)
    {
        return User::create($request->validated());
    }

    public function show(User $user)
    {
        return $user->load('address');
    }

    public function getUserEmails()
    {
        return User::select('email')->get();
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $user->update($request->validated());
       return $user;
    }

    public function destroy(User $user)
    {
        $response = $user->delete();
        return response()->json([
            'message' => $response ? 'Deletado' : 'Erro',
        ], $response ? 204 : 500);
    }
}
