<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Menu;
use DB;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->category_id ?? 'all';
        if ($request->ajax()) {
            $categoryId = $request->input('category_id');
            if ($categoryId && $categoryId != 0 && $categoryId != 'all') {
                $blogs = Blog::where('status', 'active')->where('category_id', $categoryId)->orderBy('display_order')->paginate(6);
            } else {
                $blogs = Blog::where('status', 'active')->orderBy('display_order')->paginate(6);
            }
            $data = [
                'blogs' => $blogs,
                'selected_category' => $categoryId,
            ];
            return view('include.blog-filter-list', $data)->render();
        }

        $latest = Blog::where('status', 'active')->latest()->take(3)->get();

        if ($categoryId && $categoryId != 0 || $categoryId != 'all') {
            $blogs = Blog::where('status', 'active')->whereNotIn('id', $latest->pluck('id'))->orderBy('display_order')->paginate(6);
        } else {
            $blogs = Blog::where('status', 'active')->whereNotIn('id', $latest->pluck('id'))->where('category_id', $categoryId)->orderBy('display_order')->paginate(6);
        }

        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', 'blog')->orWhere('slug', 'blogs')->first(),
            'blogs' => $blogs,
            'latest' => $latest,
            'categories' => BlogCategory::all(),
            'selected_category' => $categoryId,
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }
        
        return view('blogs', $data);
    }

    public function show($slug)
    {

        $blogs = Blog::where('slug', $slug)->first();
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => $blogs,
            'related' => Blog::where('category_id', $blogs->category_id)->where('id', '!=', $blogs->id)->where('status', 'active')->latest()->take(3)->get(),
        ];

        return view('blog-details', $data);
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
