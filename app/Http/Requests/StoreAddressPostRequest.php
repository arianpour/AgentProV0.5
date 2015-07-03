<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreAddressPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'unit'     =>'required|max:100',
            'street'   =>'required|max:300',
            'postCode'  =>'required|max:50',
            'city'      =>'required|max:50',
            'state'     =>'required|max:50',
            'country'   =>'required|max:50',
		];
	}

}
