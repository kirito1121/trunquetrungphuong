<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller {

	public function getAdd(){
		return view('frontend.contact');

	}

	public function postAdd(Request $request){

		$contact = new Contact;		
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->address = $request->address;
		$contact->phone = $request->phone;
		$contact->contact = $request->content;
		$contact->save();
		return redirect()->route('contact')->with(['flash_message'=>'Gủi yêu cầu thành công']);
	}



	public function getInfo()
	{
		$data = Contact::select('id','name','email')->get()->toArray();
		return view('backend.contact.list',compact('data'));
	}

	public function getViewbyID($id)
	{
		$data = Contact::findorFail($id);
		return view('backend.contact.view',compact('data','id'));
	}
}
