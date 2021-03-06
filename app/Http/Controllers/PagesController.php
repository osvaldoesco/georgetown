<?php

namespace App\Http\Controllers;


use \Auth;
use App\Member;
use App\Blog;
use App\PrincipalSlider;
use App\Promotion;
use App\Course;
use App\AboutSlider;
use App\Schedule;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function home() {
    $principal_slider = PrincipalSlider::where('status', 1)->orderBy('priority')->get();
    $promotions = Promotion::where('status', 1)->orderBy('priority')->get();
    $events = Blog::where('status', 1)->orderBy('priority')->take(2)->get();
    $course1 = Course::where('section', 1)->first();
    $course2 = Course::where('section', 2)->first();
    $course3 = Course::where('section', 3)->first();
    $course4 = Course::where('section', 4)->first();
    $course5 = Course::where('section', 5)->first();

    return view('welcome', compact('principal_slider', 'promotions', 'events', 'course1', 'course2', 'course3', 'course4', 'course5'));
  }

  public function about_us() {
    $members = Member::orderBy('priority')->get();
    $about_sliders = AboutSlider::orderBy('priority')->get();
    return view('site.pages.about_us', compact('members', 'about_sliders'));
  }

  public function courses() {
    $courses = Course::where('status', 1)->orderBy('priority')->get();
    return view('site.pages.courses', compact('courses'));
  }

  public function documents() {
    if(Auth::check()){
      $courses = Course::with('documents')->where('status', 1)->get();
      return view('site.pages.documents', compact('courses'));
    }
    return redirect()->route('pages.gt_login');
  }

  public function blog_detail($slug) {
    $blog = "hola";
    return view('site.pages.blog_detail', compact('blog'));
  }

  public function events(){
    $events = Blog::where('type', 1)->orderBy('priority')->paginate(3, ['*'], 'pagina-eventos');
    $news = Blog::where('type', 2)->orderBy('priority')->paginate(3, ['*'], 'pagina-nticias');
    return view('site.pages.events', compact('events', 'news'));
  }

  public function showBlog($slug){
    $event = Blog::where('slug', $slug)->firstOrFail();
    $related = Blog::where('type', $event->type)->limit(3)->get();
    return view('site.pages.blog_detail', compact('event', 'related'));
  }
  public function contact(){
    $courses = Course::where('status', 1)->get();
    $mapKey = env('MAP_KEY');
    return view('site.pages.contact', compact('courses', 'mapKey'));
  }

  public function methodology(){
    return view('site.pages.methodology');
  }

  public function course_detail($id){
    $course = Course::find($id);
    return view('site.pages.course_detail', compact('course'));
  }

  public function schedules(){
    $weekly = Schedule::where('type', 1)->orderBy('priority', 'ASC')->get();
    $saturday = Schedule::where('type', 2)->orderBy('priority', 'ASC')->get();
    $sunday = Schedule::where('type', 3)->orderBy('priority', 'ASC')->get();
    return view('site.pages.schedules', compact('weekly', 'saturday', 'sunday'));
  }

  public function store(){
    $products = Product::where('status', 1)->orderBy('priority', 'ASC')->paginate(12);
    return view('site.pages.store', compact('products'));
  }

  public function product($id){
    $product = Product::find($id);
    return view('site.pages.product', compact('product'));
  }

}