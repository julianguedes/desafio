<?php

namespace App\Http\Controllers;

use App\Models\Address;
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

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->validated());
        return $address;
    }

    public function destroy(Address $address)
    {
        $response = $address->delete();
        return response()->json([
            'message' => $response ? 'Deletado' : 'Erro',
        ], $response ? 204 : 500);
    }

}
