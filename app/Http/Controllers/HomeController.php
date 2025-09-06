<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Event;
use App\Models\News;
class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $event = Event::all();
        $news = News::all();
        return view('home',compact('countries','event','news'));
    }   

    public function about()
    {
        return view('about');
    }   
}
