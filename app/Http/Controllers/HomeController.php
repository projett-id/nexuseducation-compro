<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Event;
use App\Models\News;
use App\Models\StartYourJourney;
use App\Models\PartnerWithUs;
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

    public function start_your_journey(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'country' => 'nullable|string|max:100',
                'academic_year_plan' => 'nullable|string|max:100',
                'last_education' => 'nullable|string|max:100',
            ]);
            // Process the form data (e.g., save to database, send email, etc.)
            StartYourJourney::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'academic_year_plan' => $request->academic_year_plan,
                'last_education' => $request->last_education,
            ]); 
            return redirect()->route('start-your-journey-url')->with('success', 'Your information has been submitted successfully.');
        }
        $country = Country::all();
        return view('frontend.start_journey',compact('country'));
    }

    public function partner_with_us(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'organization_name' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'nullable|string',
            ]);
            // Process the form data (e.g., save to database, send email, etc.)
            PartnerWithUs::create([
                'organization_name' => $request->organization_name,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]); 
            return redirect()->route('partner-with-us-url')->with('success', 'Your partnership request has been submitted successfully.');
        }
        return view('frontend.partner_us');
    }

    public function listJourney()
    {
        $data = StartYourJourney::latest()->paginate(10);
        return view('admin.data_start_journey', compact('data'));
    }

    public function listPartner()
    {
        $data = PartnerWithUs::latest()->paginate(10);
        return view('admin.data_partner_us', compact('data'));
    }
}
