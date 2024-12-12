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
        // Base query for projects
        $query = Project::where('status', 'active')->where('site_visibility', 1);
    
        // Apply filters from the request
        if ($request->has('cat')) {
            $query->where('category_id', $request->cat);
        }
        if ($request->has('sector')) {
            $query->where('sector', $request->sector);
        }
        if ($request->has('country')) {
            $query->where('country', $request->country);
        }
        if ($request->has('industry')) {
            $query->where('industry', $request->industry);
        }
    
        // Get unique values for filters
        $sectors = Project::distinct()->pluck('sector')->filter()->sort();
        $countries = Project::distinct()->pluck('country')->filter()->sort();
        $industries = Project::distinct()->pluck('industry')->filter()->sort();
    
        // Paginate filtered projects
        $projects = $query->orderBy('display_order')->paginate(100);
    
        // Prepare data for the view
        $data = [
            'settings' => DB::table('settings')->find(1),
            'projects' => $projects,
            'projectCategories' => ProjectCategory::whereNull('parent_id')->get(),
            'sectors' => $sectors,
            'countries' => $countries,
            'industries' => $industries,
            'data' => Menu::where('slug', 'projects')->first(),
            'service_menu' => Menu::where('slug', 'services')->first(),
        ];
           
        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        if($request->ajax()){
            $html = '';
            foreach ($projects as $index => $project){
                $html .=view('include.project-card',compact('index','project'));
            }
            return $html;
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
