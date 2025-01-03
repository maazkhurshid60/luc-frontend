<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Project;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->category_id ?? 0;

        if ($request->ajax()) {
            if ($categoryId != 0) {
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

        $data = [
            'data' => Menu::where('slug', 'blog')->orWhere('slug', 'blogs')->first(),
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
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return $this->PageNotFound();
        }

        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'settings' => DB::table('settings')->find(1),
            'data' => $blog,
            'related' => Blog::where('category_id', $blog->category_id)
                ->where('id', '!=', $blog->id)
                ->where('status', 'active')
                ->latest()
                ->take(3)
                ->get(),
        ];

        return view('blog-details', $data);
    }

    public function PageNotFound()
    {
        abort(404);
    }
}
