<?php

namespace App\Http\Controllers;


use \Auth;
use App\Member;
use App\Blog;
use App\PrincipalSlider;
use App\Promotion;
use App\Course;
use App\AboutSlider;
use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function home() {
    $principal_slider = PrincipalSlider::where('status', 1)->orderBy('priority')->get();
    $promotions = Promotion::where('status', 1)->orderBy('priority')->get();
    $events = Blog::where('status', 1)->orderBy('priority')->take(2)->get();
    return view('welcome', compact('principal_slider', 'promotions', 'events'));
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
    $events = Blog::where('type', 1)->orderBy('priority')->paginate(3);
    $news = Blog::where('type', 2)->orderBy('priority')->paginate(3);
    return view('site.pages.events', compact('events', 'news'));
  }

  public function showBlog($slug){
    $event = Blog::where('slug', $slug)->firstOrFail();
    $related = Blog::where('type', $event->type)->limit(3)->get();
    return view('site.pages.blog_detail', compact('event', 'related'));
  }
  public function contact(){
    $courses = Course::where('status', 1)->get();
    return view('site.pages.contact', compact('courses'));
  }
}