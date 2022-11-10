<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(Request $request)
    {
        return Address::create([
            'street'=>$request->street,
            'number'=>$request->number,
            'city'=>$request->city,
            'state'=>$request->state,
            'user_id'=>$request->user_id
        ]);
    }

    public function show(Address $address)
    {
        return $address;
    }

    public function update(Request $request, Address $address)
    {
        return $address->update([
            'street'=>$request->street,
            'number'=>$request->number,
            'city'=>$request->city,
            'state'=>$request->state,
        ]);
    }

    public function destroy(Address $address)
    {
        return $address->delete();
    }
}
