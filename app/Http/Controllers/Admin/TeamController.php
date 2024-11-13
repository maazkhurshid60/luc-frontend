<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Team as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('team.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'team',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.team.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('team.view')) {
            abort(401);
        }
        $items = Obj::select('*')->latest();

        return datatables($items)
            ->addColumn('action', function ($item) {
                $action = '';
                if (auth()->user()->can('team.edit')) {
                    $action .= '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs btn-primary" >Edit</a> ';
                }
                if (auth()->user()->can('team.edit')) {
                    $action .= '<a href="javascript:fileList(' . $item->id . ')"  class="btn btn-xs btn-secondary" >Files</a> ';
                }
                if (auth()->user()->can('team.delete')) {
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
        if (!auth()->user()->can('team.create')) {
            abort(401);
        }
        $data = [
            'menu' => 'team',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.team.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('team.create')) {
            abort(401);
        }
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);
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
        if (!auth()->user()->can('team.view')) {
            abort(401);
        }
        $data['data'] = Obj::findOrFail($id);
        return view('admin.team.edit', $data);
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
        if (!auth()->user()->can('team.edit')) {
            abort(401);
        }
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
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
            if (!is_null($record->image)) {
                Storage::disk('public')->delete('images/' . $record->image);
                Storage::disk('public')->delete('thumb/' . $record->image);
            }
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }
        $record->update($request->all());
        return response()->json(['success' => 'Record is successfully Updated']);
    }

    public function updateLabel(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id' => 'required|exists:team,id',
            'label' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $label = $request->label;
        $team = Obj::find($request->id);

        if (!$team) {
            return response()->json(['errors' => ['Operation failed! Please try again']]);
        }

        $team->update(['tool_label' => $label]);

        return response()->json([
            'success' => true,
            'message' => 'Label updated successfully',
            'team_id' => $team->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('team.delete')) {
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
