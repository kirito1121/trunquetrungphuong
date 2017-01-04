<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Technical extends Model {

	protected $table = 'technicals';

	protected $fillable = ['name','slug','parent','img','img_note','comment','content','description','admin_id'];

	public $timestamps = true;

	public function admin(){
		return $this->belongTo('App\Admin');
	}

}
