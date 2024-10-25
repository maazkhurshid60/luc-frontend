<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Project as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu' => 'project',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.project.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="' . route('project.edit', $item->id) . '"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('image', function ($item) {
                return "<img width=55 src='" . asset('storage/images/' . $item->image) . "'>";
            })
            ->editColumn('category_id', function ($item) {
                return $item->category->title;
            })

            ->rawColumns(['action', 'image'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menu' => 'project',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories_id = json_encode($request->input('category_select'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'category_select' => 'required',
            'display_order' => 'required',

        ]);
        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'));
            //     $temp_name  = $request->file('file')->store('images','public');
            //     $request['image'] = str_replace('images/', '', $temp_name);
            //     Image::make(public_path('storage/images/'.$request['image']))->resize(150, null, function ($constraint) {
            //        $constraint->aspectRatio();
            //    })->save(config('constants.store_thumb_path').$request['image']);
        }
        if ($request->hasFile('file2')) {
            $request['image2'] = Helper::handleImageUpload($request->file('file2'));
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'));
        }
        $request['category_id'] = $request['category_select'][0];
        // Add the encoded JSON categories to the request data
        $request['categories_id'] = $categories_id;

        if (empty($request->input('color_code'))) {
            $request['color_code'] = '#daddff';
        }

        $project = Obj::create($request->all());

        if ($request->hasFile('header_image')) {
            $extension = $request->header_image->getClientOriginalExtension();

            if ($extension == 'svg') {
                return response()->json(['errors' => ['Header image format not supported.']]);
            }
            $temp_name = $request->file('header_image')->store('images', 'public');
            $image = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/' . $image))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $image);
            $project->header_image = $image;
            $project->save();
        }

        return response()->json(['success' => 'Record is successfully added']);
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
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'project',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.project.edit', $data);
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
        $categories_id = json_encode($request->input('category_select'));
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'category_select' => 'required',
            'display_order' => 'required',
        ]);
        // $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
            //     $temp_name  = $request->file('file')->store('images','public');
            //     $request['image'] = str_replace('images/', '', $temp_name);
            //     Image::make(public_path('storage/images/'.$request['image']))->resize(150, null, function ($constraint) {
            //        $constraint->aspectRatio();
            //    })->save(config('constants.store_thumb_path').$request['image']);
        }
        if ($request->hasFile('file2')) {
            $request['image2'] = Helper::handleImageUpload($request->file('file2'), $record->image);
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }
        $request['category_id'] = $request['category_select'][0];
        // Add the encoded JSON categories to the request data
        $request['categories_id'] = $categories_id;
        if (empty($request->input('color_code'))) {
            $request['color_code'] = '#daddff';
        }
        $record->update($request->all());

        if ($request->hasFile('header_image')) {
            $extension = $request->header_image->getClientOriginalExtension();

            if ($extension == 'svg') {
                return response()->json(['errors' => ['Header image format not supported.']]);
            }

            $temp_name = $request->file('header_image')->store('images', 'public');
            $image = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/' . $image))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $image);

            if (!is_null($record->header_image)) {
                Storage::disk('public')->delete('images/' . $record->header_image);
                Storage::disk('public')->delete('thumb/' . $record->header_image);
            }
            $record->header_image = $image;
            $record->save();
        }
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
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->image)) {
            Storage::disk('public')->delete('images/' . $record->image);
            Storage::disk('public')->delete('thumb/' . $record->image);
        }
        if (!is_null($record->header_image)) {
            Storage::disk('public')->delete('images/' . $record->header_image);
            Storage::disk('public')->delete('thumb/' . $record->header_image);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }

}
