<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('job-category.view')) {
            abort(401);
        }
        $lang = 'en';
        $data = [
            'menu' => 'job-category',
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
        ];
        return view('admin.job-category.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('job-category.view')) {
            abort(401);
        }
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {
                if (auth()->user()->can('job-category.edit')) {
                    $editEn = '<a href="javascript:updateRecord(' . $item->id . ', \'en\')" class="btn btn-xs btn-primary">Edit EN</a>';
                    $editFr = '<a href="javascript:updateRecord(' . $item->id . ', \'fr\')" class="btn btn-xs btn-secondary">Edit FR</a>';
                }
                $delete = '';
                if (auth()->user()->can('job-category.delete')) {
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
        if (!auth()->user()->can('job-category.create')) {
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
        if (!auth()->user()->can('job-category.view')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $data = [
            'data' => Obj::findOrFail($id),
            'lang' => $lang,
        ];
        return view('admin.job-category.edit', $data);
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
        if (!auth()->user()->can('job-category.edit')) {
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
        if (!auth()->user()->can('job-category.delete')) {
            abort(401);
        }
        try {
            $record = Obj::findOrFail($request->input('id'));
            if ($record->jobs()->exists()) {
                return response()->json(['success' => false, 'message' => 'Cannot delete category as it has associated jobs.']);
            }
            $record->delete();

            \Log::info("Category deleted: ", [$record]);

            return response()->json(['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            \Log::error("Error deleting category: ", ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while trying to delete the category']);
        }
    }
}
