<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'txtName' => 'required|unique:products,name',
			'slParent' => 'required:products,parent',
			'txtDescription'=>'required:products,description'
		];
	}

	public function messages(){
		return [
			'txtName.unique' => 'Tên sản phẩm này đã tồn tại',
			'txtName.required' => 'Tên sản phẩm không được để rỗng',
			'slParent.required'=> 'Danh mục phải được chọn',
			'txtDescription.required'=>'Mô tả sản phẩm không được để rỗng'
		];
	}

}
