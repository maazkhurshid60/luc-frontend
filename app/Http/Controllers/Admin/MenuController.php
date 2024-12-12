<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Menu as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class MenuController extends Controller
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
        if (!auth()->user()->can('menu.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'menu',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.menu.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('menu.view')) {
            abort(401);
        }
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {
                return view('admin.menu.action', $item);

            })
            // ->addColumn('action', function ($item) {

            //     $action = '<a href="' . route('menu.edit', $item->id) . '"  class="btn btn-xs btn-primary" >Edit</a> ';
            //     $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs btn-danger" >Delete</a> ';
            //     return $action;
            // })
            // ->editColumn('parent',function($item){
            //     if($item->parent == 0) return 'Main Menu';
            //     else
            //         return Obj::where('id',$item->parent)->pluck('name')->first();
            // })
            // ->editColumn('position',function($item){
            //     $position = json_decode($item->position);
            //     $html = "";
            //     foreach ($position as $p)
            //         $html .= "<span class='label label-primary '>".ucfirst($p)."</span> ";
            //     return $html;
            // })
            ->rawColumns(['action', 'position'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('menu.create')) {
            abort(401);
        }
        $data = [
            'menu' => 'menu',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.menu.create', $data);
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
            'name' => 'required',
            // 'display_order' => 'required|numeric',
            // 'position' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'slug' => 'required',

        ]);
        // $request['slug'] = str_slug($request->post('name'), '-');
        $request['position'] = json_encode($request->input('position'));
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
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'));
        }
        if ($request->hasFile('aboutimg')) {
            $request['about_img'] = Helper::handleImageUpload($request->file('aboutimg'));
        }
        $request['show_services'] = $request->show_services == 'on' ? '1' : '0';
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
        if (!auth()->user()->can('menu.edit')) {
            abort(401);
        }
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'menu',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.menu.edit', $data);
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
            'name' => 'required',
            'display_order' => 'required',
            'position' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            // 'slug' => 'required',
        ]);
        // $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['position'] = json_encode($request->input('position'));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }
        if ($request->hasFile('aboutimg')) {
            $request['about_img'] = Helper::handleImageUpload($request->file('aboutimg'),$record->about_image);
        }
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;
        $request['show_services'] = $request->show_services == 'on' ? '1' : '0';
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
        if (!auth()->user()->can('menu.delete')) {
            abort(401);
        }
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->image)) {
            Storage::disk('public')->delete('images/' . $record->image);
            Storage::disk('public')->delete('thumb/' . $record->image);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
