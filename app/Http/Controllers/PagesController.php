<?php

namespace App\Http\Controllers;

use App\Member;
use App\PrincipalSlider;
use App\Promotion;
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

}