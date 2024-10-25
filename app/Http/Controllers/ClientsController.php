<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use DB;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller
{
    public function index()
    {
        $data = [
            'page' => Menu::where('slug', 'clients')->first(),
            'settings' => DB::table('settings')->find(1),
        ];

        return view('clients', $data);
    }
}
