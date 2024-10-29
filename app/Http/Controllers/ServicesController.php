<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use DB;
use App\Models\Menu;
use App\Models\Slider;

class ServicesController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page' => Menu::where('slug', 'services')->first(),
            'service_menu' => Menu::where('slug', 'services')->first(),
            'services' => Service::orderBy('display_order', 'asc')
                       ->latest()->get(),
            'settings' => DB::table('settings')->find(1),
        ];

        // return view('services', $data);
        return view('service-details', $data);
    }
}
