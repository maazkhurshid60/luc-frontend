<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamFile as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class TeamFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->can('team.view')) {
            abort(401);
        }
        $files = Obj::where('team_id', $request->team_id)->orderBy('created_at', 'desc')->get();
        $team = Team::find($request->team_id);

        if ($files->count() < 1) {
            return response()->json(['html' => 'No file found', 'team_id' => $team->id]);
        }

        $view = view('admin.team.file-list', compact('files', 'team'))->render();

        return response()->json(['html' => $view, 'team_id' => $team->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!auth()->user()->can('team.create')) {
            abort(401);
        }
        $team_id = $request->team_id;
        $display_order = Obj::where('team_id', $team_id)->max('display_order') + 1;
        return view('admin.team.create-file', compact('team_id', 'display_order'));
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
            'title' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $obj = Obj::create($request->all());

        if ($request->hasFile('file')) {
            $file = Helper::handleImageUpload($request->file('file'));
        }
        $obj->file = $file;
        $obj->save();
        return response()->json([
            'success' => 'Record is successfully added',
            'id' => $obj->id,
            'team_id' => $obj->team_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if (!auth()->user()->can('team.view')) {
            abort(401);
        }
        $data = Obj::findOrFail($request->id);
        return view('admin.team.edit-file', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'title' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

        $record->update($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('file')) {
            $temp_name = $request->file('file')->store('images', 'public');
            $file = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/' . $file))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $file);
            if (!is_null($record->file)) {
                Storage::disk('public')->delete('images/' . $record->file);
                Storage::disk('public')->delete('thumb/' . $record->file);
            }
            $record->file = $file;
            $record->save();
        }

        return response()->json(['success' => 'Record is successfully added', 'id' => $record->id, 'team_id' => $record->team->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
