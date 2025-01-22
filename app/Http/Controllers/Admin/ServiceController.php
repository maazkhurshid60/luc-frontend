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
        $lang = 'en';
        $data = [
            'menu' => 'service',
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
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
                $action .= '
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs">Edit</button>
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                ';
                if (auth()->user()->can('service.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('service.edit', $item->id) . '?lang=en">Edit (EN)</a>';
                }
                if (auth()->user()->can('service.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('service.edit', $item->id) . '?lang=fr">French</a>';
                }
                $action .= '</div></div>';
                if (auth()->user()->can('service.delete')) {
                    $action .= '<a class="btn btn-danger btn-xs ml-2" href="javascript:void(0)" onclick="delete_record(' . $item->id . ')">Delete</a>';
                }

                return $action;
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
        // dd($request->all());
        if (!auth()->user()->can('service.view')) {
            abort(401);
        }

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:services',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif ,webp|max:1024',
            'company_select' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'));
        }
        if ($request->hasFile('image5')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('image5'));
        }

        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;


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
    public function edit(Request $request, $id)
    {
        if (!auth()->user()->can('service.edit')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'service',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'service_company' => Company::all(),
            'lang' => $lang,
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
        // dd($request->all());
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif ,webp|max:1024',
            'company_select' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'), $record->file);
        }
        // if ($request->hasFile('image2')) {
        //     $request['file2'] = Helper::handleImageUpload($request->file('image2'), $record->file);
        // }
        // if ($request->hasFile('image4')) {
        //     $request['file4'] = Helper::handleImageUpload($request->file('image4'), $record->file4);
        // }
        // if ($request->hasFile('image5')) {
        //     $request['og_image'] = Helper::handleImageUpload($request->file('image5'), $record->og_image);
        // }
        // if ($request->hasFile('image6')) {
        //     $request['second_image'] = Helper::handleImageUpload($request->file('image6'), $record->second_image);
        // }
        // if ($request->hasFile('image3')) {
        //     $extension = $request->image3->getClientOriginalExtension();
        //     if ($extension == 'svg') {
        //         return response()->json(['errors' => ['Banner image format not supported.']]);
        //     }

        //     $banner_name = $request->file('image3')->store('images', 'public');

        //     $image3 = str_replace('images/', '', $banner_name);
        //     $request['banner'] = $image3;

        //     Image::make($request->file('image3'))->resize(150, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save(config('constants.store_thumb_path') . $image3);
        // }
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
