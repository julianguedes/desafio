<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddressRequest;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(StoreAddressRequest $request)
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
        $address->update([
            'street'=>$request->street,
            'number'=>$request->number,
            'city'=>$request->city,
            'state'=>$request->state,
        ]);

        return $address;
    }

    public function destroy(Address $address)
    {
        return response()->json([
            'status' => 204
         ], 204);
    }

}
