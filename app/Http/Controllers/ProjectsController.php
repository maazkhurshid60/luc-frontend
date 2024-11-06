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
                'data' => Menu::where('slug', 'projects')->first(),
                'service_menu' => Menu::where('slug', 'services')->first(),
                'cat' => $request->cat,
            ];
        } else {

            $data = [
                'settings' => DB::table('settings')->find(1),
                'projects' => Project::where('status', 'active')->where('site_visibility', 1)->orderBy('display_order')->paginate(100),
                'projectCategories' => ProjectCategory::whereNull('parent_id')->get(),
                'data' => Menu::where('slug', 'projects')->first(),
                'service_menu' => Menu::where('slug', 'services')->first(),
            ];
        }
        // dd($data);
        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('projects', $data);
    }

    public function details($slug)
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => Project::where('slug', $slug)->where('status', 'active')->first(),
        ];
        // dd($data);
        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        return view('project-details', $data);
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
