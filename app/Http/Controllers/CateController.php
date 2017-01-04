<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CateRequest;

class CateController extends Controller {

	//
	public function getList()
	{
		$data = Category::select('id','name','slug','created_at')->get()->toArray();
		return view('backend.Cate.list',compact('data'));
	}

	public function getAdd()
	{
		return view('backend.Cate.add');
	}

	public function postAdd(CateRequest $request)
	{
		$category = new Category;
		$category->name = $request->txtName;
		$category->slug = createSlug($request->txtName);
		$category->description = $request->txtDescription;
		$category->parent = 1;
		$category->admin_id = 1;
		$category->save();
		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Thêm thể loại thành công']);

	}

	public function delete($id)
	{
		$category = Category::findorFail($id);
		$category->delete($id);
		return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Xóa thành công']);
	}

}
