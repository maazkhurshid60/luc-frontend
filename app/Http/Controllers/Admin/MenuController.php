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
            'lang' => 'en',
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
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            // 'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'aboutimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Prepare the data for saving
        $data = [
            'slug' => $request->input('slug'),
            'search_engine' => $request->has('search_engine') ? 1 : 0,
        ];

        // Add translatable fields in English by default
        $translatableFields = ['name', 'page_title', 'heading', 'short_description', 'description', 'about_description'];

        foreach ($translatableFields as $field) {
            $data[$field] = ['en' => $request->input($field)];
        }

        // Handle file uploads
        if ($request->hasFile('file')) {
            $data['image'] = Helper::handleImageUpload($request->file('file'));
        }

        // if ($request->hasFile('file4')) {
        //     $data['og_image'] = Helper::handleImageUpload($request->file('file4'));
        // }

        if ($request->hasFile('aboutimg')) {
            $data['about_img'] = Helper::handleImageUpload($request->file('aboutimg'));
        }

        // Create the menu object
        $menu = Obj::create($data);

        return response()->json(['success' => 'Record is successfully added', 'id' => $menu->id]);
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
        if (!auth()->user()->can('menu.edit')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'menu',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'lang' => $lang,
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

        $record = Obj::findOrFail($id);
    
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
    
        // Prepare non-translatable data
        $data = [
            'search_engine' => $request->has('search_engine') ? 1 : 0,
        ];
    
        // Handle translatable fields
        $translatableFields = [
            'name', 
            'page_title', 
            'meta_keywords', 
            'meta_description', 
            'heading', 
            'short_description', 
            'description', 
            'og_title', 
            'og_description', 
            'og_type', 
            'about_description'
        ];
    
        foreach ($translatableFields as $field) {
            if ($request->has($field)) {
                $record->setTranslation($field, $request->lang, $request->input($field));
            }
        }
    
        // Handle file uploads
        if ($request->hasFile('file')) {
            $data['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
        }
        // if ($request->hasFile('file4')) {
        //     $data['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        // }
        if ($request->hasFile('aboutimg')) {
            $data['about_img'] = Helper::handleImageUpload($request->file('aboutimg'), $record->about_img);
        }
    
        // Update the record
        $record->update($data);
    
        return response()->json(['success' => 'Record is successfully updated']);
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
