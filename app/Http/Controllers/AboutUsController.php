<?php

namespace App\Http\Controllers;

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
            'teams' => Team::where('status', 'active')->get(),
            'data' => Menu::where('slug', 'about-us')->first(),
            'journeys' => Journey::orderBy('year', 'desc')->orderBy('month', 'desc')->get(),
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'about_details' => AboutusEdits::first(),
        ];

        if (!$data['data']) {
            abort(404);
        }
        return view('about-us', $data);
    }
}
