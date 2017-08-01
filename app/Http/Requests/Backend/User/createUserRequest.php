<?php namespace App\Http\Requests\Backend\User;

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
            'firstname' 		=> 'required|string',
            'lastname' 			=> 'required|string',
            'email' 			=> 'required|email|unique:users',
            'password' 			=> 'required|min:8',
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
			'firstname.required' 	    => 'Le champ prénom est obligatoire',
			'lastname.required' 		=> 'Le champ nom est obligatoire',
			'email.required' 			=> 'Le champ email est obligatoire',
			'email.email' 				=> 'Adresse Mail invalide',
			'email.unique' 				=> 'Cette adress mail existe deja',
			'password.required' 	    => 'Le champ mot de passe est obligatoire',
		];
	}

}
