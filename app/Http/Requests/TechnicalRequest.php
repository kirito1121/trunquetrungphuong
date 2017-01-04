<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TechnicalRequest extends Request {

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
			'txtName' => 'unique:technicals,name',
			'fuImage' => 'required:technicals,img',
			'txtDescription'=>'required:technicals,description'
		];
	}

	public function messages(){
		return [
			'txtName.unique' => 'Tiêu đề này đã bị trùng lặp',
			'txtName.required' => 'Tiêu đề không được để rỗng',
			'fuImage.required'=> 'Ảnh phải được chọn',
			'txtDescription.required'=>'Mô tả nội dung không được để rỗng'
		];
	}

}
