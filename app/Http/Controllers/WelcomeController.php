<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Information;
use App\News;
use App\Product;
use App\Technical;
use App\Service;

class WelcomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __contruct(){
		$this->middleware('guest');
	}


	public function contact()
	{
		//
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.contact',compact('cate','products','technicals','services','news'));
	}

	public function index()
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->paginate(3);
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$dataproduct = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->where('parent','<>',0)->orderBy('id','ASC')->paginate(3);
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.index',compact('cate','products','technicals','services','news','dataproduct'));
	}

	public function product()
	{

		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();

		$dataproduct = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->where('parent','<>',0)->orderBy('id','ASC')->paginate(4);

		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.product',compact('cate','products','technicals','services','news','dataproduct'));
	}

	public function news()
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->paginate(4);
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.news',compact('cate','products','technicals','services','news'));
	}
	public function technical()
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->paginate(4);
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.technical',compact('cate','products','technicals','services','news'));
	}
	public function service()
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->paginate(4);
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.service',compact('cate','products','technicals','services','news'));
	}
	public function aboutus()
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.aboutus',compact('cate','products','technicals','services','news'));
	}
	public function detailP($slug)
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$product = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->where('slug',$slug)->get();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.productdetail',compact('cate','products','product','technicals','services','news'));
	}
	public function detailT($slug)
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$technical = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->where('slug',$slug)->get();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.technicaldetail',compact('cate','products','technicals','technical','services','news'));
	}
	public function detailN($slug)
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$anews = News::select('id','name','slug','parent','img','img_note','description','comment','content')->where('slug',$slug)->get();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.newsdetail',compact('cate','products','technicals','services','news','anews'));
	}
	public function detailS($slug)
	{
		$news = News::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$services = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$service = Service::select('id','name','slug','parent','img','img_note','description','comment','content')->where('slug',$slug)->get();
		$technicals = Technical::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$products = Product::select('id','name','slug','parent','img','img_note','description','comment','content')->orderBy('id','ASC')->get()->toArray();
		$cate = Category::select('id','name','slug')->orderBy('id','ASC')->get()->toArray();
		return view('frontend.pages.servicedetail',compact('cate','products','technicals','services','news','service'));
	}

}
