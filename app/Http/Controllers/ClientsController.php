<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Menu;
use App\Models\Project;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller
{
    public function index()
    {
        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'page' => Menu::where('slug', 'clients')->first(),
            'settings' => DB::table('settings')->find(1),
        ];

        return view('clients', $data);
    }
}
