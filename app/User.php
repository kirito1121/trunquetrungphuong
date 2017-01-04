<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

	//
	protected $table = 'users';

	protected $fillable = ['role_id','user_name','password','full_name','birthday','apply','email','password','phone','address','comment','img','admin_id_edit'];

	public $timestamps = false;

	public function product(){
		return $this->hasMany('App\Product');
	}
	public function news(){
		return $this->hasMany('App\News');
	}
	public function category(){
		return $this->hasMany('App\Category');
	}
	public function contact(){
		return $this->hasMany('App\Contact');
	}
	public function information(){
		return $this->hasMany('App\Information');
	}
	public function technical(){
		return $this->hasMany('App\Technical');
	}
}	
