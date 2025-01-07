<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Announcement as Obj;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('announcement.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'announcement',
            'settings' => \DB::table('settings')->first(),
            'lang' => 'en',
        ];
        return view('admin.announcement.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('announcement.view')) {
            abort(401);
        }
        $items = Obj::select('*');
        return datatables($items)
            ->addColumn('action', function ($item) {
                return view('admin.announcement.action', $item);
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('announcement.create')) {
            abort(401);
        }
        $data = [
            'menu' => 'announcement',
            'settings' => \DB::table('settings')->first(),
        ];
        return view('admin.announcement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'description' => 'required|string',
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            ],
            [
                'file.required' => 'The Image is Required',
            ],
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'));
        }
        $announcement = Obj::create($request->all());
        return response()->json(['success' => 'Record is successfully added', 'id' => $announcement->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        if (!auth()->user()->can('announcement.edit')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'announcement',
            'settings' => \DB::table('settings')->first(),
            'data' => $element,
            'lang' => $lang,
        ];
        return view('admin.announcement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = Obj::findOrFail($id);

        // Validate the request
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'search_engine' => $request->has('search_engine') ? 1 : 0,
        ];
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
        }
        $record->update($request->all());
        return response()->json(['success' => 'Record is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('announcement.delete')) {
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
