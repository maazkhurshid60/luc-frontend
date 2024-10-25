<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ClientController extends Controller
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
            'menu' => 'client',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.client.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('logo', function ($item) {
                return "<img width=55 src='" . asset('storage/images/' . $item->logo) . "'>";
            })

            ->rawColumns(['action', 'logo'])
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
            'menu' => 'client',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.client.create', $data);
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500',
            'display_order' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {

            $temp_name = $request->file('file')->store('images', 'public');
            $request['logo'] = str_replace('images/', '', $temp_name);

            Image::make(public_path('storage/images/' . $request['logo']))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $request['logo']);
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
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'client',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.client.edit', $data);
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
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500',
            'display_order' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {

            $temp_name = $request->file('file')->store('images', 'public');
            $request['logo'] = str_replace('images/', '', $temp_name);

            Image::make(public_path('storage/images/' . $request['logo']))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $request['logo']);
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
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->logo)) {
            Storage::disk('public')->delete('images/' . $record->logo);
            Storage::disk('public')->delete('thumb/' . $record->logo);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
