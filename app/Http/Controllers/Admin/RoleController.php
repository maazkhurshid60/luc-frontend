<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
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
            'menu' => 'role',
        ];
        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menu' => 'role',
        ];
        return view('admin.role.create', $data);
    }

    public function datatable(Request $request)
    {
        $items = Role::select('*');
        return datatables($items)
            ->addColumn('action', function ($item) {
                if ($item->is_default == 0) {
                    return view('admin.role.action', $item);
                }

            })
            ->editColumn('created_at', function ($item) {
                return Helper::setDate($item->created_at);
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($request->input('Permission'))) {
            return response()->json(['errors' => [['At least one permission required']]]);
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:roles',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $role = Role::create(['name' => $request->input('name'), 'remarks' => $request->input('remarks')]);
        foreach ($request->input('Permission') as $key => $name) {
            $permission = Permission::where('name', $name)->get();
            $role->givePermissionTo($permission);
        }
        return response()->json(['success' => 'Role is successfully added', 'id' => $role->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('role.edit')) {
            abort(401);
        }
        $obj = Role::findOrFail($id);
        $role_permissions = array();

        foreach ($obj->permissions as $permission) {
            $role_permissions[] = $permission->name;
        }

        $data = [
            'role_permissions' => $role_permissions,
            'obj' => $obj,
            'menu' => 'role',
        ];
        return view('admin.role.edit', $data);
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
        $role = Role::find($id);
        if (is_null($request->input('Permission'))) {
            return response()->json(['errors' => [['At least one permission required']]]);
        }

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $role->update(['name' => $request->input('name')]);
        $role->syncPermissions();
        $new_flag = false;

        foreach ($request->input('Permission') as $key => $name) {
            $permission = Permission::where('name', $name)->get();
            if ($permission->count() == 0) {
                $permission = new Permission;
                $permission->name = $name;
                $permission->guard_name = 'web';
                $permission->save();
                $new_flag = true;
            }
            $role->givePermissionTo($permission);
        }

        Artisan::call('permission:cache-reset');
        return response()->json(['success' => 'Record is successfully updated', 'id' => $role->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
