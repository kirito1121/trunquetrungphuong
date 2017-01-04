<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList()
	{
		$data = Service::select('id','name','created_at')->get()->toArray();
		return view('backend.service.list',compact('data'));
	}

	public function getViewbyID($id)
	{
		$data = Service::findorFail($id);
		return view('backend.service.view',compact('data','id'));
	}


	public function getAdd()
	{
		$data = Service::select('id','name','slug','created_at')->get()->toArray();

		return view('backend.service.add',compact('data'));
	}

	public function postAdd(ServiceRequest $request)
	{
		

		$service = new Service;
		$now = time();
		$service->name = $request->txtName;
		$service->slug = createSlug($request->txtName);
		$service->parent = 0;
		$file_name = ($request->file('fuImage')->getClientOriginalName());
		$name = "$now$file_name";
		$request->file('fuImage')->move("uploads/images/",$name);
		$service->img = "/uploads/images/$name";
		$service->description = $request->txtDescription;
		$service->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$service->comment = $request->txtCmt;
		$service->admin_id = 1;		
		$service->save();
		return redirect()->route('admin.service.getAdd')->with(['flash_message'=>'Thêm dịch vụ thành công']);
	}

	public function getEdit($id)
	{
		$data = Service::findorFail($id);
		return view('backend.service.edit',compact('data','id'));
	}

	public function postEdit(Request $request,$id)
	{
		$this->validate($request,
			[	'txtName' => 'required',
				'txtDescription'=>'required'

			],
			[
				'txtName.required' => 'Tiêu đề không được để rỗng',
				'txtDescription.required'=>'Nội dung không được để rỗng'
			]);
		$service = Service::findorFail($id);
		$now = time();
		$service->name = $request->txtName;
		$service->slug = createSlug($request->txtName);
		$service->parent = 0;
		if ($request->hasFile('fuImage')) {				
			$file_name = ($request->file('fuImage')->getClientOriginalName());
			$name = "$now$file_name";
			$request->file('fuImage')->move("uploads/images/",$name);
			$service->img = "uploads/images/$name";
		}
		$service->description = $request->txtDescription;
		$service->comment = $request->txtCmt;
		$service->content = str_limit($request->txtContent, $limit = 250, $end = '...');
		$service->admin_id = 1;		
		$service->save();
		return redirect()->route('admin.service.getList')->with(['flash_message'=>"Cập nhập dữ liệu thành công"]);

	}

	public function delete($id)
	{
		$service = Service::findorFail($id);
		$service->delete($id);
		return redirect()->route('admin.service.getList')->with(['flash_message'=>'Xóa thành công']);
	}


}
