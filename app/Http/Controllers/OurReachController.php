<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Project;
use DB;
use Illuminate\Support\Facades\View;

class OurReachController extends Controller
{
    public function index()
    {
        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', 'our-reach')->first(),
            'projects' => Project::where('status', 'active')->where('site_visibility', 1)->orderBy('display_order')->latest()->take(6)->get(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('our-reach', $data);
    }
    public function PageNotFound()
    {
        return view('errors.404');
    }
}
