<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	//
	protected $table = 'services';

	protected $fillable = ['name','slug','parent','comment','img','img_note','description','admin_id'];

	public $timestamps = true;

	public function admin(){
		return $this->belongTo('App\Admin');
	}

}
