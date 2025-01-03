<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Mail\contactUs;
use App\Models\Project;
use App\Models\Settings;

class ContactUsController extends Controller
{
    public function index()
    {
        $data = [
            'data' => Menu::where('slug', 'contact-us')->first(),
            'settings' => Settings::first(),
        ];

        if (is_null($data['data'])) {
            abort(404);
        }

        return view('contact-us', $data);
    }
}
