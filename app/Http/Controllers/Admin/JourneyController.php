<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Team;
use App\Models\Journey as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('journey.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'journey',
            'team' => Team::where('status', 'active')->pluck('id', 'name'),
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.journey.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('journey.view')) {
            abort(401);
        }

        $items = Obj::select('*');
        
        return datatables($items)
            ->addColumn('action', function ($item) {
                $action = '';
                if (auth()->user()->can('journey.edit')) {
                    $action .= '<a href="' . route('journey.edit', $item->id) . '"  class="btn btn-xs btn-primary" >Edit</a> ';
                }
                if (auth()->user()->can('journey.delete')) {
                    $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs btn-danger" >Delete</a> ';
                }
                return $action;
            })
            ->editColumn('created_at', function($item){
                return Helper::setDate($item->created_at);
            })

            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('journey.view')) {
            abort(401);
        }

        $data = [
            'menu' => 'journey',
            // 'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.journey.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('journey.view')) {
            abort(401);
        }

        $validator = \Validator::make($request->all(), [
            'year' => 'required',
            'month' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
       


        $obj = Obj::create($request->all());

        return response()->json(['success' => 'Record is successfully added', 'id' => $obj->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Journey $journey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('journey.edit')) {
            abort(401);
        }

        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'journey',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.journey.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('journey.edit')) {
            abort(401);
        }

        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'year' => 'required',
            'month' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $record->update($request->all());
        return response()->json(['success' => 'Record is successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('journey.delete')) {
            abort(401);
        }

        $record = Obj::findOrFail($request->input('id'));
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
