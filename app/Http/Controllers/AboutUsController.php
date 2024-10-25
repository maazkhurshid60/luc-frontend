<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Team;
use App\Models\Menu;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'teams' => Team::where('status', 'active')->get(),
            'page' => Menu::where('slug', 'about-us')->first(),
        ];
        return view('about_us' , compact('data'));
    }
}
