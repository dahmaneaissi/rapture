<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class updateEntityRequest extends Request {

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
            'firstname' 		=> 'required|string',
            'lastname' 			=> 'required|string',
            'active' 			=> 'required|bool',
		];
	}

	/*
	 * Error Messages
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'firstname.required' 		=> 'Le champ Prénom est obligatoire',
			'firstname.alpha' 			=> 'Prénom invalide',
			'lastname.required' 		=> 'Le champ Nom est obligatoire',
			'lastname.alpha' 			=> 'Nom invalide'
		];
	}

}
