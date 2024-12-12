<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Menu;
use DB;

class ServicesController extends Controller
{
    //

    public function index()
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', 'services')->first(),
            'companies' => Company::orderBy('display_order', 'asc')->latest()->get(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('services', $data);

    }

    public function details($slug)
    {
        $obj = Company::where('slug', $slug)->where('status', 'active')->first();

        if (is_null($obj)) {
            return $this->PageNotFound(); // Company not found
        }
        
        $blogs = Blog::whereJsonContains('service_id', (string) $obj->id)
            ->latest()
            ->where('status', 'active')
            ->take(3)
            ->get();
        
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => $obj,
            'services' => $obj->services,
            'related' => $blogs,
            'faqs' => Faq::where('status', 'active')->get(),
        ];
        
        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }
        
        // dd($data);
        
        return view('service-details', $data);
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
