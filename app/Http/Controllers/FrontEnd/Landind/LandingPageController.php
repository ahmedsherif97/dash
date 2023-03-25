<?php

namespace App\Http\Controllers\FrontEnd\Landind;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\HomeSection;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    protected function index(){
        $homeSections = HomeSection::get();
        $abouts = $homeSections->where('type', 'about');
        $features = $homeSections->where('type', 'feature');
        $success_partners = $homeSections->where('type', 'success_partners');
        $packages = Package::all();
        $settings = Setting::query()->first();
        return view('website.index', compact('abouts', 'features', 'success_partners', 'packages', 'settings'));
    }
    protected function contactUs(Request $request){
        $validate = $request->validate([
            'first_name' => 'required|String',
            'last_name' => 'required|String',
            'email' => 'required|email',
            'message' => 'required|String',
        ]);
        ContactUs::query()->create($validate);
        return redirect()->back()->with('success', __('dash.successful_operation'));
    }
}
