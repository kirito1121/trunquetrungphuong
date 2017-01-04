<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request {

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
			'txtEmail' =>'required|email',
			'txtPassword' => 'required|min:8'
		];
	}
	public function messages()
	{
		return[	
			'txtEmail.required' => 'Email là trường bắt buộc',
    		'txtEmail.email' => 'Email không đúng định dạng',
    		'txtPassword.required' => 'Mật khẩu là trường bắt buộc',
    		'txtPassword.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
		];
	}

}
