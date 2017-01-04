<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//
	protected $table = 'categories';

	protected $fillable = ['name','slug','description','parent','admin_id'];

	public $timestamps = true;

	public function admin(){
		return $this->belongTo('App\Admin');
	}
}
