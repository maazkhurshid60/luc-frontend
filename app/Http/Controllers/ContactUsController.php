<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Mail\contactUs;
use App\Models\Project;
use app\Models\Feedback;
use App\Models\Settings;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'settings' => Settings::first(),
            'data' => Menu::where('slug', 'contact-us')->first(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }
        // dd($data);
        return view('contact-us', $data);
    }

    public function contactUs(Rerquest $request)
    {
        $input = $request->all();
        $data = Feedback::create($request->only((new Feedback)->getFillable()));

        Mail::to($request->user())->send(new contactUs($input));

        return back();
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
