<?php

namespace App\Http\Controllers;

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
        ];

        if (!$data['page']) {
            abort(404);
        }

        return view('clients', $data);
    }
}
