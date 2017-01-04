<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Admin;
class LoginController extends Controller {

	public function getLogin(){
		return view('backend.login');
	}

	public function postLogin(Request $request){
		
		$email = $request->txtEmail;
		$password = $request->txtPassword;
		$admins = Admin::all();
		foreach ($admins as $row) {
			if($email == $row->email && $password == $row->password){
				return redirect()->route('admin.news.getList')->with(['email'=>$email]);
			}else{
				print_r('ko dc');
			}
		}
	}
	// public function index(){
	// 	$data = Admin::select('user_name','email','password')->get();
	// 	return view('backend.news.list',compact('data'));
	// }
}
