<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog as Obj;
use App\Models\BlogCategory;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
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
            'menu' => 'blog',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.blog.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="' . route('blog.edit', $item->id) . '"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('image', function ($item) {
                return "<img width=55 src='" . asset('storage/images/' . $item->cover_image) . "'>";
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
            'menu' => 'blog',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
            'BlogCategory' => BlogCategory::all(),
            'services' => Service::all(),
            'members' => Team::all(),
        ];
        return view('admin.blog.create', $data);
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
            'short_description' => 'required',
            'display_order' => 'required',
            'file3' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ]);
        $request['slug'] = Str::slug($request->post('title'), '-');

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
            $request['breadcrumb'] = Helper::handleImageUpload($request->file('file2'));
        }
        if ($request->hasFile('file3')) {
            $request['cover_image'] = Helper::handleImageUpload($request->file('file3'));
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'));
        }

        $request['service_id'] = json_encode($request->service_id);
        $request['pro_id'] = json_encode($request->pro_id);
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;
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
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'blog',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'BlogCategory' => BlogCategory::all(),
            'services' => Service::all(),
            'members' => Team::all(),
        ];
        return view('admin.blog.edit', $data);
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
            'short_description' => 'required',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);
        // $request['slug'] = Str::slug($request->post('slug'), '-');

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
            $request['breadcrumb'] = Helper::handleImageUpload($request->file('file2'), $record->image);
        }

        if ($request->hasFile('file3')) {
            $request['cover_image'] = Helper::handleImageUpload($request->file('file3'), $record->cover_image);
        }

        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }

        $request['service_id'] = json_encode($request->service_id);
        $request['pro_id'] = json_encode($request->pro_id);

        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;
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
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->image)) {
            Storage::disk('public')->delete('images/' . $record->image);
            Storage::disk('public')->delete('thumb/' . $record->image);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
