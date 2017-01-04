<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsRequest extends Request {

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
			'txtCmt' => 'required:news,comment',
			'fuImage' => 'required:news,img',
			'txtName' => 'unique:news,name',
			'txtName' => 'required:news,name',
			'txtDescription'=>'required:news,description',
		];
	}

	public function messages(){
		return [
			'txtName.unique' => 'Tiêu đều của tin yêu cầu không trùng lặp',	
			'txtName.required' => 'Tiêu đề không được để rỗng',
			'txtCmt' => 'Comment không được để trống',
			'txtDescription.required'=>'Nội dung tin không được để rỗng',
			'fuImage.required'=>'Ảnh phải được chọn',
		];
	}

}
