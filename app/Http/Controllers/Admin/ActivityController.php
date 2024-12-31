<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (!auth()->user()->can('activity.view')) {
            abort(403, 'Unauthorized action.');
        }
        $settings = \DB::table('settings')->first();
        $data = [
            'menu' => 'activity',
            'settings' => $settings,
            'users' => User::all(),
        ];
        return view('admin.activity-log.index', $data);
    }
    public function show($id)
    {
        //
    }

    public function datatable(Request $request)
    {
        if (!auth()->user()->can('activity.view')) {
            abort(403, 'Unauthorized action.');
        }
        $items = Activity::with('causer');

        if (!is_null($request->causer_id)) {
            $items->where('causer_id', $request->causer_id);
        }
        if (!is_null($request->log_name)) {
            $items->where('log_name', $request->log_name);
        }
        if (!is_null($request->subject_id)) {
            $items->where('subject_id', $request->subject_id);
        }
        if (!empty($request->date)) {
            $date = explode('/', $request->date);

            // Validate start and end dates
            $start_time = isset($date[0]) ? trim($date[0]) : null;
            $end_time = isset($date[1]) ? trim($date[1]) : null;

            if ($start_time && $end_time) {
                $whereBetween = [date('Y-m-d', strtotime($start_time)) . ' 00:00:00', date('Y-m-d', strtotime($end_time)) . ' 23:59:59'];
                $items->whereBetween('created_at', $whereBetween);
            }
        }

        return datatables($items)
            ->addColumn('subject', function ($item) {
                return $item->subject_id;
            })
            ->editColumn('created_at', function ($item) {
                return Helper::setDate($item->created_at);
            })
            ->addColumn('causer', function ($item) {
                return $item->causer->name;
            })
            ->editColumn('action', function ($item) {
                return view('admin.activity-log.action', $item);
            })
            ->toJson();
    }
}
