<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServiceRequest extends Request {

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
			//
			'txtCmt' => 'required:service,comment',
			'fuImage' => 'required:service,img',
			'txtName' => 'unique:service,name',
			'txtName' => 'required:service,name',
			'txtDescription'=>'required:service,description',
		];
	}

	public function messages(){
		return [
			'txtName.unique' => 'Tiêu đều  yêu cầu không trùng lặp',	
			'txtName.required' => 'Tiêu đề không được để rỗng',
			'txtCmt' => 'Comment không được để trống',
			'txtDescription.required'=>'Nội dung không được để rỗng',
			'fuImage.required'=>'Ảnh phải được chọn',
		];
	}

}
