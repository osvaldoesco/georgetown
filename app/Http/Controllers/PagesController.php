<?php

namespace App\Http\Controllers;


use \Auth;
use App\Member;
use App\PrincipalSlider;
use App\Promotion;
use App\Course;
use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function home() {
    $principal_slider = PrincipalSlider::where('status', 1)->orderBy('priority')->get();
    $promotions = Promotion::where('status', 1)->orderBy('priority')->get();
    return view('welcome', compact('principal_slider', 'promotions'));
  }

  public function about_us() {
    $members = Member::orderBy('priority')->get();
    return view('site.pages.about_us', compact('members'));
  }

  public function courses() {
    $courses = Course::where('status', 1)->orderBy('priority')->get();
    return view('site.pages.courses', compact('courses'));
  }

  public function documents() {
    if(Auth::check()){
      return view('site.pages.documents');
    }
    return redirect()->route('pages.gt_login');
  }
}