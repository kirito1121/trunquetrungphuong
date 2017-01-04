<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $table = 'news';

	protected $fillable = ['name','slug','parent','img','img_note','content','description','comment','admin_id'];

	public $timestamps = true;

	public function admin(){
		return $this->belongTo('App\Admin');
	}

}
