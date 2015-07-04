<?php namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgreementPostRequest;
use App\Http\Requests\StoreAgrPostRequest;
use App\Property;
use App\RentalAgreement;
use Illuminate\Support\Facades\Input;
use Session;

use App\Http\Requests\StorePreAgreementPostRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalAgreementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $agreementList=User::findOrFail(Auth::user()->id)->rentalAgreement;

        return view('agreement.agreement',compact('agreementList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function preCreate()
	{
        $clientList=User::findOrFail(Auth::user()->id)->client->where('role','tenant')->lists('name','id');
        $ownerList=User::findOrFail(Auth::user()->id)->client->where('role','owner')->lists('name','id');


        return view('agreement.addpreAgreement',compact('clientList','ownerList'));

	}

    /**
     * Show the form for creating a new resource.
     *
     * @param StorePreAgreementPostRequest $request
     * @return Response
     */
    public function create(){

        Session::put('client_id', Input::get('tenant'));
        Session::put('owner_id', Input::get('owner'));

        $propertyList=Client::findOrFail(Input::get('owner'))->property()->get();
        $adds=array();
        foreach($propertyList as $property){
            array_push($adds,$property->addresses()->get()->lists('unit_street','id'));
        }
        return view('agreement.addAgreement',compact('adds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAgreementPostRequest $request
     * @return Response
     */
	public function store(Request $request)
	{
        $agreement= new RentalAgreement(array(

            'client_id'         =>  Session::get('client_id'),
            'owner_id'          =>  Session::get('owner_id'),
            'property_id'       =>  $request->property_id,
            'user_id'           =>  Auth::user()->id,
            'dateOfAgreement'   =>  $request->dateOfAgreement,
            'commencingDate'    =>  $request->commencingDate,
            'expireDate'        =>  $request->expireDate,
            'rentalAmount'      =>  $request->rentalAmount,
            'rentalDeposit'     =>  $request->rentalDeposit,
            'utilitiesDeposit'  =>  $request->utilitiesDeposit,
            'otherDeposit'      =>  $request->otherDeposit,
            'premiseUse'        =>  $request->premiseUse
        ));


        $agreement->save();
        Session::flash('flash_message', 'Agreement successfully added! ');

        return view('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $agreement=RentalAgreement::find($id);
        $address=Address::find($agreement->property_id);
        $client=Client::find($agreement->client_id);
        $owner=Client::find($agreement->owner_id);
        return view('agreement.showAgreement',compact('agreement','address','client','owner'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $agreement=RentalAgreement::findOrFail($id);
        return view('agreement.editAgreement',compact('agreement'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
        $agreement=RentalAgreement::findOrFail($id);
        $input=$request->all();
        $agreement->fill($input)->save();
        Session::flash('flash_message', 'Agreement successfully Updated!');
        return redirect()->back();	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $agreement = RentalAgreement::findOrFail($id);
        $agreement->delete();

        Session::flash('flash_message', 'Agreement successfully deleted!');

        return redirect()->action('RentalAgreementController@index');	}

}
