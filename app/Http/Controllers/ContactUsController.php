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
            'data' => Menu::where('slug', 'contact-us')->first(),
            'alladdress' => DB::table('address')->get(),
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
