<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(StoreAddressRequest $request)
    {
        return Address::create($request->validated());
    }

    public function show(Address $address)
    {
        return $address;
    }

    public function update(Request $request, UpdateAddressRequest $address)
    {
        $address->update($request->safe()->except(['user_id']));
        return $address;
    }

    public function destroy(Address $address)
    {
        return response()->json([
            'status' => 204
         ], 204);
    }

}
