<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Infomation extends Model {

	//
	protected $table = 'infomations';

	protected $fillable = ['companyname','tradingname','companyaddress','campaddress','companyphonenumber','campphonenumber','businesslicense','taxcode','account','email','images','admin_id'];

	public $timestamps = false;

	public function admin(){
		return $this->belongTo('App\Admin');
	}
}
