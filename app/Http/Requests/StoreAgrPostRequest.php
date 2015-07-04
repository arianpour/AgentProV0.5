<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreAgrPostRequest extends Request {

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
        //TODO: not able to add rules for validation
		return [

            'dateOfAgreement'=>'required|max:1',
		];
	}

}
