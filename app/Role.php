<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	//
	protected $table = 'roles';

	protected $fillable = ['name','comment'];

	public $timestamps = false;

	public function admin(){
		return $this->hasMany('App\Admin');
	}

}
