<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Technical;
use App\Http\Requests\TechnicalRequest;
use Input;

class TechnicalController extends Controller {

	//
	public function getList()
	{
		$data = Technical::select('id','name','created_at')->get()->toArray();
		return view('backend.technical.list',compact('data'));
	}

	public function getViewbyID($id)
	{
		$data = Technical::findorFail($id);
		return view('backend.technical.view',compact('data','id'));
	}


	public function getAdd(){
		$data = Technical::select('id','name','slug','created_at')->get()->toArray();
		return view('backend.technical.add',compact('data'));
	}



	public function postAdd(TechnicalRequest $request)
	{
		$now = time();
		$tech = new Technical;
		$tech->name = $request->txtName;
		$tech->slug = createSlug($request->txtName);
		$tech->parent = 0;
		$tech->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$tech->img = "/uploads/images/$name";
		$tech->description = $request->txtDescription;
		$tech->comment = $request->txtCmt;
		$tech->admin_id = 1;		
		$tech->save();
		return redirect()->route('admin.technical.getAdd')->with(['flash_message'=>'Thêm kĩ thật thành công']);
	}



	public function getEdit($id)
	{
		$data = Technical::findorFail($id);
		return view('backend.technical.edit',compact('data','id'));
	}

	public function postEdit(Request $request,$id)
	{
		$this->validate($request,
			[	'txtName' => 'required',
				'txtDescription'=>'required'

			],
			[
				'txtName.required' => 'Tiêu đề không được để rỗng',
				'txtDescription.required'=>'Nội dung kĩ thuật không được để rỗng'
			]);
		$now = time();
		$tech = Technical::findorFail($id);
		$tech->name = $request->txtName;
		$tech->slug = createSlug($request->txtName);
		$tech->parent = 0;
		$tech->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		if ($request->hasFile('fuImage')) {				
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$tech->img = "uploads/images/$name";
		}
		$tech->description = $request->txtDescription;
		$tech->comment = $request->txtCmt;
		$tech->admin_id = 1;		
		$tech->save();
		return redirect()->route('admin.technical.getList')->with(['flash_message'=>"Cập nhập dữ liệu thành công"]);

	}


	public function delete($id)
	{
		$cate = Technical::findorFail($id);
		$cate->delete($id);
		return redirect()->route('admin.technical.getList')->with(['flash_message'=>'Xóa thành công']);
	}

}
