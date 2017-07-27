<?php namespace App\Http\Requests\Backend\Access\Roles;

use App\Http\Requests\Request;

class createRoleRequest extends Request {

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
            'title'     => 'required|string',
            'slug'      => 'required|unique:roles',
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
        $data = parent::all();
        $data['slug'] = isset( $data['slug'] ) && $data['slug'] ? str_slug( $data['slug'] ) : ( isset( $data['title']  ) ? str_slug( $data['title'] ) : '' );
        return $data;
    }

}
