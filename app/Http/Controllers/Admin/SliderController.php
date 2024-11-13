<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider as Obj;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('slider.view')) {
            abort(401);
        }

        $data = [
            'menu' => 'slider',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.slider.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('slider.view')) {
            abort(401);
        }

        $items = Obj::select('*');

        return datatables($items)
            ->editColumn('image', function ($item) {
                return "<img width=55 src='" . asset('storage/images/' . $item->image) . "'>";
            })
            ->addColumn('action', function ($item) {
                $action = '';
                if (auth()->user()->can('slider.edit')) {
                    $action .= '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs btn-primary" >Edit</a> ';
                }if (auth()->user()->can('slider.delete')) {
                    $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs btn-danger" >Delete</a> ';
                }
                return $action;
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
        if (!auth()->user()->can('slider.create')) {
            abort(401);
        }

        $validator = \Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {

            $temp_name = $request->file('file')->store('images', 'public');
            $request['image'] = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/' . $request['image']))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $request['image']);
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
        if (!auth()->user()->can('slider.view')) {
            abort(401);
        }

        $data['data'] = Obj::findOrFail($id);
        return view('admin.slider.edit', $data);
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
        if (!auth()->user()->can('slider.edit')) {
            abort(401);
        }
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $temp_name = $request->file('file')->store('images', 'public');
            $request['image'] = str_replace('images/', '', $temp_name);
            Image::make(config('constants.image') . $request['image'])->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $request['image']);
            if (!is_null($record->image)) {
                Storage::disk('public')->delete('images/' . $record->image);
                Storage::disk('public')->delete('thumb/' . $record->image);
            }
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
        if (!auth()->user()->can('slider.delete')) {
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
