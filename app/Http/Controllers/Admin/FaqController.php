<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq as Obj;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
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
            'menu' => 'faq',
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
        ];
        return view('admin.faq.index', $data);
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
            ->editColumn('category_id', function ($item) {
                return $item->category->title;
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
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required',
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
        return view('admin.faq.edit', $data);
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
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required',

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
