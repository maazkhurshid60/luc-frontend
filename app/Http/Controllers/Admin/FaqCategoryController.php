<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory as Obj;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FaqCategoryController extends Controller
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
        if (!auth()->user()->can('faq.view')) {
            abort(401);
        }
        $lang = 'en';
        $data = [
            'menu' => 'faq-category',
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
        ];
        return view('admin.faq-category.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('faq.view')) {
            abort(401);
        }
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {
                if (auth()->user()->can('faq.edit')) {
                    $editEn = '<a href="javascript:updateRecord(' . $item->id . ', \'en\')" class="btn btn-xs btn-primary">Edit EN</a>';
                    $editFr = '<a href="javascript:updateRecord(' . $item->id . ', \'fr\')" class="btn btn-xs btn-secondary">Edit FR</a>';
                }
                $delete = '';
                if (auth()->user()->can('faq.delete')) {
                    $delete = '<a href="javascript:delete_record(' . $item->id . ')" class="btn btn-xs btn-danger">Delete</a>';
                }
                return $editEn . ' ' . $editFr . ' ' . $delete;
            })
            ->editColumn('created_at', function ($item) {
                return \App\Helpers\Helper::setDate($item->created_at);
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
        if (!auth()->user()->can('faq.create')) {
            abort(401);
        }
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
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
    public function show(Request $request, $id)
    {
        if (!auth()->user()->can('faq.view')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $data = [
            'data' => Obj::findOrFail($id),
            'lang' => $lang,
        ];
        return view('admin.faq-category.edit', $data);
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
        if (!auth()->user()->can('faq.edit')) {
            abort(401);
        }
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
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
        if (!auth()->user()->can('faq.delete')) {
            abort(401);
        }
        $record = Obj::findOrFail($request->input('id'));
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
