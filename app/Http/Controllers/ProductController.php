<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use Input;
class ProductController extends Controller {

	//
	public function getList()
	{
		$data = Product::select('id','name','parent','created_at')->get()->toArray();
		return view('backend.product.list',compact('data'));
	}

	public function getViewbyID($id)
	{
		$data = Product::findorFail($id);
		return view('backend.product.view',compact('data','id'));
	}

	public function getAdd()
	{
		$data = Product::select('id','name','slug','parent','created_at')->get()->toArray();
		return view('backend.product.add',compact('data'));
	}
	public function postAdd(ProductRequest $request)
	{
		$now = time();

		$product = new Product;
		$product->name = $request->txtName;
		$product->slug = str_slug($request->txtName);	
		$product->parent = $request->slParent;					
		$file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$product->img = "uploads/images/$name";
		$product->comment = $request->txtCmt;
		$product->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$product->description = $request->txtDescription;
		$product->admin_id = 1;	
		$product->save();
		return redirect()->route('admin.product.getAdd')->with(['flash_message'=>'Thêm sản phẩm thành công']);
	}

	public function getEdit($id)
	{
		$data = Product::findorFail($id);
		$dm = Product::select('id','name','slug','content','img','parent','created_at')->get()->toArray();
		return view('backend.product.edit',compact('data','id','dm'));
	}

	public function postEdit(Request $request,$id)
	{
		$now = time();

		$this->validate($request,
			[	'txtName' => 'required',
				'slParent' => 'required',
				'txtDescription'=>'required'

			],
			[
				'txtName.required' => 'Tên sản phẩm không được để rỗng',
				'slParent.required'=> 'Danh mục phải được chọn',
				'txtDescription.required'=>'Nội dung mô tả không được để rỗng'
			]);
		$product = Product::findorFail($id);
		$product->name = $request->txtName;		
		$product->slug = createSlug($request->txtName);
		$product->parent = $request->slParent;
		if ($request->hasFile('fuImage')) {				
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$product->img = "uploads/images/$name";
		}
		$product->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$product->description = $request->txtDescription;
		$product->comment = $request->txtCmt;
		$product->admin_id = 1;		
		$product->save();
		return redirect()->route('admin.product.getList')->with(['flash_message'=>"Cập nhập dữ liệu thành công"]);

	}

	public function delete($id)
	{
		$cate = Product::findorFail($id);
		$cate->delete($id);
		return redirect()->route('admin.product.getList')->with(['flash_message'=>'Xóa thành công']);
	}

}
