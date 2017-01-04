<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\News;
class NewsController extends Controller {

	//
	public function getList()
	{
		$data = News::select('id','name','created_at')->get()->toArray();
		return view('backend.news.list',compact('data'));
	}

	public function getViewbyID($id)
	{
		$data = News::findorFail($id);
		return view('backend.news.view',compact('data','id'));
	}


	public function getAdd()
	{
		$data = News::select('id','name','slug','created_at')->get()->toArray();

		return view('backend.news.add',compact('data'));
	}

	public function postAdd(NewsRequest $request)
	{
		

		$news = new News;
		$now = time();
		$news->name = $request->txtName;
		$news->slug = createSlug($request->txtName);
		$news->parent = 0;
		$file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$news->img = "uploads/images/$name";
		$news->description = $request->txtDescription;
		$news->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$news->comment = $request->txtCmt;
		$news->admin_id = 1;		
		$news->save();
		return redirect()->route('admin.news.getAdd')->with(['flash_message'=>'Thêm tin tức thành công']);
	}

	public function getEdit($id)
	{
		$data = News::findorFail($id);
		return view('backend.news.edit',compact('data','id'));
	}

	public function postEdit(Request $request,$id)
	{
		$this->validate($request,
			[	'txtName' => 'required',
				'txtDescription'=>'required'

			],
			[
				'txtName.required' => 'Tiêu đề không được để rỗng',
				'txtDescription.required'=>'Nội dung tin không được để rỗng'
			]);
		$news = News::findorFail($id);
		$now = time();
		$news->name = $request->txtName;
		$news->slug = createSlug($request->txtName);
		$news->parent = 0;
		if ($request->hasFile('fuImage')) {				
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$news->img = "uploads/images/$name";
		}
		$news->description = $request->txtDescription;
		$news->comment = $request->txtCmt;
		$news->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$news->admin_id = 1;		
		$news->save();
		return redirect()->route('admin.news.getList')->with(['flash_message'=>"Cập nhập dữ liệu thành công"]);

	}

	public function delete($id)
	{
		$news = News::findorFail($id);
		$news->delete($id);
		return redirect()->route('admin.news.getList')->with(['flash_message'=>'Xóa thành công']);
	}

}
