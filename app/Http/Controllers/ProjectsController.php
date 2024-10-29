<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Project;
use App\Models\ProjectCategory;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {

        if ($request->cat) {
            $data = [
                'settings' => DB::table('settings')->find(1),
                'projects' => Project::where('status', 'active')->where('site_visibility', 1)->where('category_id', $request->cat)->orderBy('display_order')->paginate(100),
                'projectCategories' => ProjectCategory::whereNull('parent_id')->get(),
                'page' => Menu::where('slug', 'portfolio')->first(),
                'service_menu' => Menu::where('slug', 'services')->first(),
                'cat' => $request->cat,
            ];
        } else {

            $data = [
                'settings' => DB::table('settings')->find(1),
                'projects' => Project::where('status', 'active')->where('site_visibility', 1)->orderBy('display_order')->paginate(100),
                'projectCategories' => ProjectCategory::whereNull('parent_id')->get(),
                'page' => Menu::where('slug', 'portfolio')->first(),
                'service_menu' => Menu::where('slug', 'services')->first(),
            ];
        }

        return view('projects', $data);
        return view('project-details', $data);
    }

    public function details($slug)
    {
        $service = Project::where('slug', $slug)->where('status', 'active')->first();
        $settings = DB::table('settings')->find(1);

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $service,

        ];

        if (is_null($service)) {
            return $this->PageNotFound();
        }

        // Check if the view exists for the specified slug
        if (!View::exists('portfolio/' . $slug)) {
            // If view does not exist, redirect to another page
            return view('portfolio/single_portfolio', compact('data', 'settings'));
        }

        // Render the view for the specific slug
        return view('portfolio/' . $slug, compact('data', 'settings'));

    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
