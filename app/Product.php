<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//
	protected $table = 'products';

	protected $fillable = ['name','slug','parent','comment','img','img_note','content','description','admin_id'];

	public $timestamps = true;

	public function admin(){
		return $this->belongTo('App\Admin');
	}
}
