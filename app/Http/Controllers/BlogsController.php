<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Team;
use DB;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        // if(!is_null($request->input('q')) && $request->input('q') != '')
        //     $blogs = Blog::where('status','active')->where('title','like','%'.$request->input('q').'%')->latest()->paginate(12);
        // else
        //     $blogs = Blog::where('status','active')->latest()->paginate(12);
        if ($request->ajax()) {
            $categoryId = $request->input('category_id');
            if ($categoryId) {
                $blogs = Blog::where('status', 'active')->where('category_id', $categoryId)->orderBy('display_order')->paginate(12);
            } else {
                $blogs = Blog::where('status', 'active')->orderBy('display_order')->paginate(12);
            }

            return view('include.blog-filter-list', compact('blogs'))->render();
        }

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'blog')->orWhere('slug', 'blogs')->first(),

        ];
        // if (is_null($data['page'])) return $this->PageNotFound();

        $blogs = Blog::where('status', 'active')->orderBy('display_order')->paginate(12);
        $categories = BlogCategory::all();
        return view('blogs', compact('blogs', 'data', 'categories'));
    }

    public function show($slug)
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
        ];

        $blogs = Blog::where('slug', $slug)->first();

        // Fetch related blogs by category, exclude the current one, and limit to 4
        $related = Blog::where('category_id', $blogs->category_id)
            ->where('id', '!=', $blogs->id) // Exclude the current blog
            ->where('status', 'active')
            ->latest()
            ->take(3)
            ->get();

        $related_services = $members = [];
        $serviceIds = json_decode($blogs->service_id, true);
        $members = json_decode($blogs->pro_id, true);

        if ($serviceIds) {
            $related_services = Service::whereIn('id', $serviceIds)->get();
        }
        if ($members) {
            $members = Team::whereIn('id', $members)->get();
        }
        return view('blog_details', compact('blogs', 'data', 'related', 'related_services', 'members'));
    }

    public function show2($slug)
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
        ];

        $blogs = Blog::where('slug', $slug)->first();

        // Fetch related blogs by category, exclude the current one, and limit to 4
        $related = Blog::where('category_id', $blogs->category_id)
            ->where('id', '!=', $blogs->id) // Exclude the current blog
            ->where('status', 'active')
            ->latest()
            ->take(3)
            ->get();

        $related_services = $members = [];
        $serviceIds = json_decode($blogs->service_id, true);
        $members = json_decode($blogs->pro_id, true);

        if ($serviceIds) {
            $related_services = Service::whereIn('id', $serviceIds)->get();
        }
        if ($members) {
            $members = Team::whereIn('id', $members)->get();
        }
        return view('blog_details2', compact('blogs', 'data', 'related', 'related_services', 'members'));
    }

}
