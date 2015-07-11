<?php namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use Session;
use App\Property;
use App\User;
use Auth;

class PropertyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $propertyList=User::findOrFail(Auth::user()->id)->property;

        return view('property.property',compact('propertyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $ownerList=User::findOrFail(Auth::user()->id)->client->where('role','owner');

        return view('property.addProperty',compact('ownerList'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Property $property
     * @return Response
     * @internal param $id
     * @internal param StoreAddressPostRequest $request
     */
    public function store(Property $property)
    {

        $propertyadd= new Property(array(

            'client_id'=> $property->id
        ));

        $propertyadd->save();
        Session::put('AddRole', 'property');
        Session::put('PropertyInsertedId', $propertyadd->id);
        Session::flash('flash_message', 'Add Property Address! ');
        Session::put('addressMessage', 'New Address for property');

        return redirect('address/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Address $address
     * @return Response
     * @internal param int $id
     */
    public function edit(Address $address)
    {
        return view('property.editProperty',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Address $address)
    {
        $property=Property::find($address->addressable_id);
        $property->delete();

        $address->delete();
        return redirect()->back();

    }

}
