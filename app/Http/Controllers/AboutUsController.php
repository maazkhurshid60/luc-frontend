<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Menu;
use App\Models\Team;
use App\Models\Journey;
use App\Models\Project;
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
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'about_details' => AboutusEdits::first(),
        ];
        return view('about-us' , $data);
    }
}
