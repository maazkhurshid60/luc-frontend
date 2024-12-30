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
        if (!auth()->user()->can('project-category.view')) {
            abort(401);
        }
        $lang = 'en';
        $data = [
            'menu' => 'project-category',
            'settings' => DB::table('settings')->first(),
            'parentcategories' => Obj::whereNull('parent_id')->get(),
            'lang' => $lang,
        ];
        return view('admin.project-category.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('project-category.view')) {
            abort(401);
        }
        $items = Obj::select('*');

        return datatables($items)
        ->addColumn('action', function ($item) {
            $editEn = '<a href="javascript:updateRecord(' . $item->id . ', \'en\')" class="btn btn-xs btn-primary">Edit EN</a>';
            $editFr = '<a href="javascript:updateRecord(' . $item->id . ', \'fr\')" class="btn btn-xs btn-secondary">Edit FR</a>';
            $delete = '';
            if (auth()->user()->can('blog-category.delete')) {
                $delete = '<a href="javascript:delete_record(' . $item->id . ')" class="btn btn-xs btn-danger">Delete</a>';
            }
            return $editEn . ' ' . $editFr . ' ' . $delete;
        })
        ->editColumn('created_at', function ($item) {
            return \App\Helpers\Helper::setDate($item->created_at);
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
        if (!auth()->user()->can('project-category.create')) {
            abort(401);
        }
        $validator = \Validator::make($request->all(), [
            'title' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
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
    public function show(Request $request, $id)
    {
        if (!auth()->user()->can('project-category.view')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $data = [
            'data' => Obj::findOrFail($id),
            'lang' => $lang,
        ];
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
        if (!auth()->user()->can('project-category.edit')) {
            abort(401);
        }
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
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
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('project-category.delete')) {
            abort(401);
        }
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
