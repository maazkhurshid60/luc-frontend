<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
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
            'menu' => 'application',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.application.index', $data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs my-1 btn-primary" >View</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('file', function ($item) {
                if (!is_null($item->file)) {
                    return "<a  href='" . asset('storage/images/' . $item->file) . "'> Download CV</a>";
                }

            })
            ->editColumn('job_id', function ($item) {
                if (!is_null($item->job_id)) {
                    return $item->job->title;
                }

            })

            ->rawColumns(['action', 'file'])
            ->toJson();
    }

    public function show($id)
    {
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'application',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.application.show', $data);
    }

    public function destroy(Request $request, $id)
    {
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->file)) {
            Storage::disk('public')->delete('images/' . $record->file);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
