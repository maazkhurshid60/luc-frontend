<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\QuoteationForm as Obj;

class QuoteationFormController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('quotation.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'quotation',
            'team' => Team::where('status', 'active')->pluck('id', 'name'),
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.quotation-form.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('lead.view')) {
            abort(401);
        }
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
                $action = '';
                if (auth()->user()->can('quotation.view')) {
                    $action .= '<a href="javascript:updateRecord(' . $item->id . ')"  class="btn btn-xs my-1 btn-primary" >View</a> ';
                }
                if (auth()->user()->can('quotation.delete')) {
                    $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                }
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
        if (!auth()->user()->can('lead.view')) {
            abort(401);
        }
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'quoteationform',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.quotation-form.show', $data);
    }
}
