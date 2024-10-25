<?php

namespace App\Http\Controllers;

use App\Mail\contactUs;
use app\Models\Feedback;
use App\Models\Menu;
use App\Models\Team;
use DB;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'teams' => Team::where('status', 'active')->get(),
            'page' => Menu::where('slug', 'contact-us')->first(),
        ];
        // dd('aaaa');
        $alladdress = DB::table('address')->get();
        $settings = DB::table('settings')->find(1);

        return view('contact_us', compact('settings', 'alladdress', 'data'));
    }
    public function contactUs(Rerquest $request)
    {
        $input = $request->all();
        dd($input);
        $data = Feedback::create($request->only((new Feedback)->getFillable()));

        Mail::to($request->user())->send(new contactUs($input));

        return back();
    }
}
