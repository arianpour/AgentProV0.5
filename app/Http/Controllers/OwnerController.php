<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;


use App\Http\Requests\StoreaddClientPostRequest;
use App\User;
use Auth;
use Session;

class OwnerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //TODO: change it to show the owner lists
        $clientList=User::findOrFail(Auth::user()->id)->client->where('role','owner');
        return view('owner.owners',compact('clientList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('owner.addOwner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddClientPostRequest $request
     * @return Response
     */
    public function store(StoreaddClientPostRequest $request)
    {
        $person = new Client(array(
            'name'     =>  $request->name,
            'user_id'       =>  Auth::user()->id,
            'nationality'   =>  $request->nationality,
            'email'         =>  $request->email,
            'idNumber'      =>  $request->idNumber,
            'phoneNo'       =>  $request->phoneNo,
            'role'          =>  'owner'

        ));
        $person->save();
        Session::put('ClientInsertedId', $person->id);
        Session::put('AddRole', 'owner');
        Session::flash('flash_message', 'Owner successfully added! Need to add the Address');
        return redirect('bankDetail/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Client $client)
    {
        $property=array();
        $address=$client->addresses()->get();
        $bankDetails=$client->bankDetails()->get();
        $propertyd=$client->property()->get();
        foreach($propertyd as $item){
            array_push($property, $item->addresses()->get());
        }
        return view('owner.showOwner',compact('client','address','bankDetails','property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Client $client)
    {

        return view('owner.editOwner',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param StoreaddClientPostRequest $request
     * @return Response
     */
    public function update(Client $client,StoreaddClientPostRequest $request)
    {

        $input=$request->all();
        $client->fill($input)->save();
        Session::flash('flash_message', 'Owner successfully Updated!');
        Session::put('addressMessage', 'Update Owner Details');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Client $client)
    {
        $client->addresses()->delete();
        $client->bankDetails()->delete();
        $propertyd=$client->property()->get();
        foreach($propertyd as $item){
            $item->addresses()->delete();
        }
        $client->property()->delete();
        $client->delete();
        Session::flash('flash_message', 'Owner successfully deleted!');
        return redirect()->action('OwnerController@index');

    }

}
