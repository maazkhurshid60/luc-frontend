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
        $lang = 'en';
        $data = [
            'menu' => 'journey',
            'team' => Team::where('status', 'active')->pluck('id', 'name'),
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
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
                $action .= '
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs">Edit</button>
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                ';
                if (auth()->user()->can('journey.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('journey.edit', $item->id) . '?lang=en">Edit (EN)</a>';
                }
                if (auth()->user()->can('journey.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('journey.edit', $item->id) . '?lang=fr">French</a>';
                }
                $action .= '</div></div>';
                if (auth()->user()->can('journey.delete')) {
                    $action .= '<a class="btn btn-danger btn-xs ml-2" href="javascript:void(0)" onclick="delete_record(' . $item->id . ')">Delete</a>';
                }

                return $action;
            })
            ->editColumn('created_at', function ($item) {
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

        $data = [
            'year' =>  $request->input('year'),
            'month' => ['en' => $request->input('month')],
            'title' => ['en' => $request->input('title')],
            'description' => ['en' => $request->input('description')],
        ];

        $obj = Obj::create($data);

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
    public function edit(Request $request, $id)
    {
        // dd($request->all());
        if (!auth()->user()->can('journey.edit')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'journey',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'lang' => $lang,
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
        // dd($request->all());
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
        $record->year = $request->input('year');
        if ($request->lang == 'en') {
            $record->setTranslation('month', 'en', $request->input('month'));
            $record->setTranslation('title', 'en', $request->input('title'));
            $record->setTranslation('description', 'en', $request->input('description'));
        }
        if ($request->lang == 'fr') {
            $record->setTranslation('month', 'fr', $request->input('month'));
            $record->setTranslation('title', 'fr', $request->input('title'));
            $record->setTranslation('description', 'fr', $request->input('description'));
        }
        $record->save();
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
