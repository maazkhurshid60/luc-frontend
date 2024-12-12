<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Menu;
use App\Models\Team;
use App\Models\Journey;
use App\Models\AboutusEdits;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'teams' => Team::where('status', 'active')->get(),
            'data' => Menu::where('slug', 'about-us')->first(),
            'journeys' => Journey::orderBy('year', 'desc')->orderBy('month', 'desc')->get(),
            'about_details' => AboutusEdits::first(),
        ];
        return view('about-us' , $data);
    }
}
