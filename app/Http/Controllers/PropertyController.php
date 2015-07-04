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
     * @param $id
     * @return Response
     * @internal param StoreAddressPostRequest $request
     */
    public function store($id)
    {
        $property= new Property(array(

            'client_id'=> $id
        ));

        $property->save();
        Session::put('AddRole', 'property');
        Session::put('PropertyInsertedId', $property->id);
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $address=Address::findOrFail($id);
        // $address=Address::findOrFail($address->id);

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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $address=Address::find($id);
        $property=Property::find($address->addressable_id);
        $property->delete();

        $address->delete();
        return redirect()->back();

    }

}
