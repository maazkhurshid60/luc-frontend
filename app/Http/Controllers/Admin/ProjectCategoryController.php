<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\ProjectCategory as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu' => 'project-category',
            'settings' => DB::table('settings')->first(),
            'parentcategories' => Obj::whereNull('parent_id')->get(),
        ];
        return view('admin.project-category.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs btn-danger" >Delete</a> ';
                return $action;
            })

            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'icon_file' => 'required|image|mimes:svg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'));
        }
        if ($request->hasFile('icon_file')) {
            $request['icon'] = Helper::handleImageUpload($request->file('icon_file'));
        }
        
        $obj = Obj::create($request->all());
        return response()->json(['success' => 'Record is successfully added', 'id' => $obj->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Obj::findOrFail($id);
        return view('admin.project-category.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'icon_file' => 'nullable|image|mimes:svg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
        }
        if ($request->hasFile('icon_file')) {
            $request['icon'] = Helper::handleImageUpload($request->file('icon_file'));
        }

        $record->update($request->all());
        return response()->json(['success' => 'Record is successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request,$id)
    // {
    //     Project::where('categories_id' '')
    //     $record = Obj::findOrFail($request->input('id'));
    //     $record->delete();
    //     return back()->with('success','Record Deleted successfully');
    // }

    // public function destroy(Request $request, $id)
    //  {

    //      $category = Obj::findOrFail($request->input('id'));

    //          $projects = DB::table('projects')->get();
    //          $categoryInProjects = false;
    //          foreach ($projects as $project) {
    //              $categories_ids = json_decode($project->categories_id, true);
    //              if (is_array($categories_ids) && in_array($request->input('id'), $categories_ids)) {
    //                  $categoryInProjects = true;
    //                  break;
    //              }
    //          }

    //          \Log::info("Category in projects: ", [$categoryInProjects]);

    //          if ($categoryInProjects) {
    //              return back()->with('error', 'Category is associated with a project and cannot be deleted');
    //          }

    //          // Delete the category
    //          $category->delete();
    //          \Log::info("Category deleted: ", [$category]);

    //          return back()->with('success', 'Category deleted successfully');
    //  }

    public function destroy(Request $request, $id)
    {
        try {
            $category = Obj::findOrFail($request->input('id'));

            $projects = DB::table('projects')->get();
            $categoryInProjects = false;
            foreach ($projects as $project) {
                $categories_ids = json_decode($project->categories_id, true);
                if (is_array($categories_ids) && in_array($request->input('id'), $categories_ids)) {
                    $categoryInProjects = true;
                    break;
                }
            }

            if ($categoryInProjects) {
                return response()->json(['success' => false, 'message' => 'Category is associated with a project and cannot be deleted']);
            }

            $category->delete();

            \Log::info("Category deleted: ", [$category]);

            return response()->json(['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            \Log::error("Error deleting category: ", ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while trying to delete the category']);
        }
    }

}
