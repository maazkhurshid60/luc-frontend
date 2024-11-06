<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Helpers\Helper;
use App\Models\Job as Obj;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
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
            'menu' => 'job',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.job.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="' . route('job.edit', $item->id) . '"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('image', function ($item) {
                return "<img width=55 src='" . asset('storage/thumb/' . $item->image) . "'>";
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
            'menu' => 'job',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.job.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->post('slug'), '-');
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'apply_before' => 'required',
            'type' => 'required',
            'status' => 'required',
            'position' => 'nullable|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ]);
        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'));
            // $temp_name = $request->file('image')->store('images', 'public');
            // $request['file'] = str_replace('images/', '', $temp_name);
            // Image::make(public_path('storage/images/' . $request['file']))->resize(150, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save(config('constants.store_thumb_path') . $request['file']);
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'));
        }
        $obj = Obj::create($request->all());

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

            $obj->header_image = $image;
            $obj->save();
        }

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
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'job',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.job.edit', $data);
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
            'category_id' => 'required',
            'apply_before' => 'required',
            'type' => 'required',
            'status' => 'required',
            'position' => 'nullable|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);
        // $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('image')) {
            $request['file'] = Helper::handleImageUpload($request->file('image'), $record->file);
            // $temp_name = $request->file('image')->store('images', 'public');
            // $request['file'] = str_replace('images/', '', $temp_name);
            // Image::make(config('constants.image') . $request['file'])->resize(150, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save(config('constants.store_thumb_path') . $request['file']);
            // if (!is_null($record->file)) {
            //     Storage::disk('public')->delete('images/' . $record->file);
            //     Storage::disk('public')->delete('thumb/' . $record->file);
            // }
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
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

        if (!is_null($record->file)) {
            Storage::disk('public')->delete('images/' . $record->file);
            Storage::disk('public')->delete('thumb/' . $record->file);
        }
        if (!is_null($record->header_image)) {
            Storage::disk('public')->delete('images/' . $record->header_image);
            Storage::disk('public')->delete('thumb/' . $record->header_image);
        }

        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
