<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use App\Models\Service as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('service.view')) {
            abort(401);
        }

        $data = [
            'menu' => 'service',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.service.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('service.view')) {
            abort(401);
        }

        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {
                $action = '';
                if (auth()->user()->can('service.edit')) {
                    $action .= '<a href="' . route('service.edit', $item->id) . '"  class="btn btn-xs btn-primary" >Edit</a> ';
                }
                if (auth()->user()->can('service.delete')) {
                    $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs btn-danger" >Delete</a> ';
                }
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
        if (!auth()->user()->can('service.view')) {
            abort(401);
        }

        $data = [
            'menu' => 'service',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
            'service_company' => Company::all()
        ];
        return view('admin.service.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('service.view')) {
            abort(401);
        }

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
            'display_order' => 'required',
            'slug' => 'required|unique:services',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif ,webp|max:1024',
            'image2' => 'required|image|mimes:svg|max:1024',
            'image3' => 'nullable|image|mimes:svg|max:1024',
            'projectcategory' => 'required',
            'featured_project' => 'required',
            'company_select' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'));
        }
        if ($request->hasFile('image2')) {
            $request['file2'] = Helper::handleImageUpload($request->file('image2'));
        }
        if ($request->hasFile('image4')) {
            $request['file4'] = Helper::handleImageUpload($request->file('image4'));
        }
        if ($request->hasFile('image5')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('image5'));
        }
        if ($request->hasFile('image6')) {
            $request['second_image'] = Helper::handleImageUpload($request->file('image6'));
        }
        if ($request->hasFile('image3')) {
            $extension = $request->image3->getClientOriginalExtension();
            if ($extension == 'svg') {
                return response()->json(['errors' => ['Banner image format not supported.']]);
            }
            $banner_name = $request->file('image3')->store('images', 'public');

            $image3 = str_replace('images/', '', $banner_name);
            $request['banner'] = $image3;

            Image::make($request->file('image3'))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $image3);
        }
        $request['position'] = json_encode($request->input('position'));
        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        $featuredProjects = json_encode($request->input('featured_project'), true);
        $request['featured_projects'] = $featuredProjects; // Assuming `featured_pro
        $request['company_id'] = $request->company_select;
        // dd($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('service.edit')) {
            abort(401);
        }

        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'service',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'service_company' => Company::all()
        ];
        return view('admin.service.edit', $data);
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
        if (!auth()->user()->can('service.edit')) {
            abort(401);
        }

        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif ,webp|max:1024',
            'image2' => 'nullable|image|mimes:svg|max:1024',
            'image3' => 'nullable|image|mimes:svg|max:1024',
            'projectcategory' => 'required',
            'featured_project' => 'required',
            'company_select' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'), $record->file);
        }
        if ($request->hasFile('image2')) {
            $request['file2'] = Helper::handleImageUpload($request->file('image2'), $record->file);
        }
        if ($request->hasFile('image4')) {
            $request['file4'] = Helper::handleImageUpload($request->file('image4'), $record->file4);
        }
        if ($request->hasFile('image5')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('image5'), $record->og_image);
        }
        if ($request->hasFile('image6')) {
            $request['second_image'] = Helper::handleImageUpload($request->file('image6'), $record->second_image);
        }
        if ($request->hasFile('image3')) {
            $extension = $request->image3->getClientOriginalExtension();
            if ($extension == 'svg') {
                return response()->json(['errors' => ['Banner image format not supported.']]);
            }

            $banner_name = $request->file('image3')->store('images', 'public');

            $image3 = str_replace('images/', '', $banner_name);
            $request['banner'] = $image3;

            Image::make($request->file('image3'))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $image3);
        }

        $featuredProjects = json_encode($request->input('featured_project'), true);
        $request['featured_projects'] = $featuredProjects; // Assuming `featured_pro

        // $request['slug'] = $slug = Str::slug($request->post('title'));
        $request['position'] = json_encode($request->input('position'));
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;
        $request['company_id'] = $request->company_select;
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
        if (!auth()->user()->can('service.delete')) {
            abort(401);
        }

        $record = Obj::findOrFail($request->input('id'));
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }

    public function getFeaturedProjects(Request $request)
    {
        // Retrieve category_id from the request
        $categoryId = $request->input('category_id');

        if (is_null($categoryId)) {
            return response()->json(['error' => 'Category ID is required.'], 400);
        }

        // Initialize the query for featured projects
        $query = Project::query();

        // Apply filter if category_id is provided
        $featuredProjects = $query->whereJsonContains('categories_id', $categoryId)->get();

        // Optionally, you can check if there are any projects found
        if ($featuredProjects->isEmpty()) {
            return response()->json(['message' => 'No projects found.'], 404);
        }

        // Return the results as JSON
        return response()->json($featuredProjects);
    }
}
