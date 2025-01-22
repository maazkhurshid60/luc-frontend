<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('user.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'user',
            'settings' => Settings::first(),
        ];

        return view('admin.user.index', $data);
    }

    public function datatable(Request $request)
    {
        if (!auth()->user()->can('user.view')) {
            abort(403, 'Unauthorized action.');
        }
        $items = User::select('*')->where('user_id', '!=', 1);

        if ($request->has('status') && !is_null($request->input('status'))) {
            $items->where('status', $request->input('status'));
        }

        return datatables($items)
            ->addColumn('action', function ($item) {
                return view('admin.user.action', $item);
            })
            ->editColumn('image', function ($item) {
                if ($item->image != null) {
                    return "<img width=35 src='" . asset('storage/images/' . $item->image) . "'>";
                }
            })
            ->addColumn('role', function ($item) {
                return $item->getRoleNames()->first();
            })
            ->rawColumns(['action', 'image'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('user.create')) {
            abort(403);
        }

        $data = [
            'menu' => 'user',
            'settings' => Settings::first(),
        ];

        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('user.create')) {
            abort(401);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'contact' => 'nullable|numeric|digits_between:1,15',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users|min:4|max:200|regex:/^[a-zA-Z0-9_]+$/u',
            'password' => 'required|min:6|max:30',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'city' => 'nullable|max:100',
            'country' => 'nullable|max:100',
            'province' => 'nullable|max:100',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('profile_image')) {
            $request['image'] = Helper::handleImageUpload($request->file('profile_image'));
        }

        $user = User::create($request->all());

        if ($request->exists('role')) {
            $role = Role::where('name', $request->input('role'))->first();
            $user->assignRole($role->name);
        }

        return response()->json(['success' => 'User account is successfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('user.edit')) {
            abort(401);
        }

        $data = [
            'menu' => 'user',
            'settings' => Settings::first(),
            'element' => User::findOrFail($id),
        ];
        // dd($data['element']);
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if (!auth()->user()->can('user.edit')) {
            abort(401);
        }
        if ($request->input('username')) {
            unset($request['username']);
        }
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:200',
            'contact' => 'nullable|numeric|digits_between:1,15',
            'email' => 'nullable|unique:users,email,' . $id . ',user_id',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'city' => 'nullable|max:100',
            'country' => 'nullable|max:100',
            'province' => 'nullable|max:100',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = User::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            $request['image'] = Helper::handleImageUpload($request->file('profile_image'), $user->image);
        } else {
            $request['image'] = $user->image;
        }

        $user->update($request->all());

        return response()->json(['success' => 'User is successfully updated']);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!auth()->user()->can('user.edit')) {
            abort(401);
        }

        $validator = \Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        
        $user->update($request->only(['password']));

        return response()->json(['success' => 'Password updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
