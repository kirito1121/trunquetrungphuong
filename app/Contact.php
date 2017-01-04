<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	//
	protected $table = 'contacts';

	protected $fillable = ['name','email','phone','contact','admin_id'];

	public $timestamps = false;

	public function admin(){
		return $this->belongTo('App\Admin');
	}
}
