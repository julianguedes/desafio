<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::where('name', 'ILIKE', '%'. $request->name .'%')->latest()->get();
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
            'message' => $response ? 'Usuário deletado com sucesso!' : 'Ocorreu um erro.',
        ], $response ? 204 : 500);
    }

    public function showUserInfos(User $user)
    {
        return $user->load(['address', 'tasks']);

    }
}
