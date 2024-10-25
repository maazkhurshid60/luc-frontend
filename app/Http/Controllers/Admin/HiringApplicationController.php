<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiringApplication as Obj;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HiringApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu' => 'hiring-application',
            'team' => Team::where('status', 'active')->pluck('id', 'name'),
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.hiring-application.index', $data);
    }

    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        if ($request->has('client') && $request->input('client') !== "") {
            $items->where('name', 'like', '%' . $request->input('client') . '%');
        }

        if ($request->has('member') && !empty($request->input('member'))) {
            $items->where('team_id', $request->input('member'));
        }
        if ($request->has('service') && !empty($request->input('service'))) {
            $items->whereJsonContains('service', $request->input('service'));
        }

        if ($request->has('technology') && !empty($request->input('technology'))) {
            $items->whereJsonContains('technology', $request->input('technology'));
        }

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs my-1 btn-primary" >View</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })

            ->editColumn('team_id', function ($item) {
                if (!is_null($item->team_id)) {
                    return $item->team->name;
                }
            })

            ->rawColumns(['action', 'team_id'])
            ->toJson();
    }

    public function show($id)
    {
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'hiring-application',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.hiring-application.show', $data);
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
