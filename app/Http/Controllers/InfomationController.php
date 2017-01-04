<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Infomation;
use App\Http\Requests\InfomationRequest;
class InfomationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getInfo()
	{
		$data = Infomation::find(1);
		return view('backend.infomation.view',compact('data'));
	}

	public function getEdit($id)
	{
		$data = Infomation::find($id);
		return view('backend.infomation.edit',compact('data'));
	}

	public function postEdit(InfomationRequest $request,$id)
	{
		$info = Infomation::find($id);
		$info->companyname = $request->txtCompanyName;
		$info->tradingname = $request->txtTradingName;
		$info->companyaddress = $request->txtCompanyAddress;
		$info->campaddress = $request->txtCampAddress;
		$info->companyphonenumber = $request->txtCompanyPhone;
		$info->campphonenumber = $request->txtCampPhone;
		$info->businesslicense = $request->txtBusinessLicense;
		$info->taxcode = $request->txtTaxCode;
		$info->account = $request->txtAccount;
		$info->email = $request->txtEmail;
		$info->images = 'img';
		$info->admin_id = 1;
		$info->save();

		return redirect()->route('admin.infomation.getInfo')->with(['flash_message'=>'Cập nhập thông tin công ty đã thành công']);
	}


	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
