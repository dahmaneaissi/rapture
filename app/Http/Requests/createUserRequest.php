<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class createUserRequest extends Request {

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
            'name' 				=> 'required|string',
            'lastname' 			=> 'required|string',
            'tel' 				=> 'required|numeric|min:9',
            'email' 			=> 'required|email|unique:users',
            'willaya' 			=> 'required|integer|min:1|max:48',
            'conditions' 		=> 'required'
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
			'name.required' 			=> 'Le champ prénom est obligatoire',
			'name.alpha' 				=> 'Prénom invalide',
			'lastname.required' 		=> 'Le champ nom est obligatoire',
			'lastname.alpha' 			=> 'Nom invalide',
			'tel.required' 				=> 'Le champ téléphone est obligatoire',
			'tel.numeric' 				=> 'Numéro de téléphone invalide',
			'email.required' 			=> 'Le champ email est obligatoire',
			'email.email' 				=> 'Adresse Mail invalide',
			'email.unique' 				=> 'Cette adress mail existe deja',
			'willaya.required' 			=> 'Le champ willaya est obligatoire',
			'willaya.integer' 			=> 'Wilaya invalide',
			'conditions.required' 		=> 'L\'acceptation du réglement est obligatoire'
		];
	}

}
