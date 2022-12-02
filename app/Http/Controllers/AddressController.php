<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    public function index(Request $request)
    //                        ('Field', 'operator', 'valor')
    //                          ('Filed',5)  operator  =
    {
        return Address::
            when(isset($request->number), function($query) use($request) 
            {
                 $query->where('number', $request->number);
            })
            ->when($request->has('street'), function($query) use($request) 
            {
                 $query->where('street', 'ILIKE', '%' . $request->street . '%');
            })
            ->when($request->has('order_by'), function($query) use($request) 
            {
                 $query->orderBy('created_at', $request->order_by);
            })
            ->get();
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
            'message' => $response ? 'Endereço deletado com sucesso!' : 'Ocorreu um erro.',
        ], $response ? 204 : 500);
    }

}
