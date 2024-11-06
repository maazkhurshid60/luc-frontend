<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Service;
use DB;

class ServicesController extends Controller
{
    //

    public function index()
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', 'services')->first(),
            'services' => Service::orderBy('display_order', 'asc')->latest()->get(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('services', $data);

    }

    public function details($slug)
    {
        $obj = Service::where('slug', $slug)->where('status', 'active')->first();
        $blogs = Blog::whereJsonContains('service_id', (string) $obj->id)->latest()->where('status', 'active')->take(3)->get();
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => $obj,
            'related' => $blogs,
            'faqs' => Faq::where('status', 'active')->get(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('service-details', $data);
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
