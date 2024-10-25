<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback as Obj;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu' => 'feedback',
            'team' => Team::where('status', 'active')->pluck('id', 'name'),
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.feedback.index', $data);
    }

    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        if ($request->has('name') && $request->input('name') !== "") {
            $items->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('service') && !empty($request->input('service'))) {
            $items->whereJsonContains('services', $request->input('service'));
        }

        if ($request->has('technology') && !empty($request->input('technology'))) {
            $items->whereJsonContains('technologies', $request->input('technology'));
        }

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs my-1 btn-primary" >View</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })


            ->rawColumns(['action'])
            ->toJson();
    }

    public function show($id)
    {
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'feedback',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.feedback.show', $data);
    }

    public function destroy(Request $request)
    {
        $application = Obj::find($request->id);

        if ($application) {
            $application->delete();
            return response()->json([
                'success' => true,
                'message' => 'Record Deleted Successfully.',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Error Occured Please try again.',
        ]);
    }
}
