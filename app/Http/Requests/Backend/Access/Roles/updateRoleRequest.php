<?php namespace App\Http\Requests\Backend\Access\Roles;

use App\Http\Requests\Request;

class updateRoleRequest extends RoleRequest {

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
            'title'         => 'required|string',
            'slug'          => 'required|unique:roles,slug,' . $this->route()->getParameter('id'),
            'permissions'   => 'required',
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
			'title.required'    => 'Le champ Prénom est obligatoire',
			'slug.required'     => 'Le champ Slug est obligatoire',
			'slug.unique'       => 'Ce Slug existe déja',
		];
	}

    /**
     * @return array
     */
    public function all()
    {
        return parent::all();
    }

}
