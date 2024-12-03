<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Company as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyController extends Controller
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
        if (!auth()->user()->can('company.view')) {
            abort(401);
        }
        $data = [
            'menu' => 'company',
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.company.index', $data);
    }

    public function datatable(Request $request)
    {
        if (!auth()->user()->can('company.view')) {
            abort(401);
        }
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {
                $action = '';
                if (auth()->user()->can('company.edit')) {
                    $action .= '<a href="' . route('company.edit', $item->id) . '"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                }
                if (auth()->user()->can('company.delete')) {
                    $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                }
                return $action;
            })
            ->editColumn('created_at', function ($item) {
                return \App\Helpers\Helper::setDate($item->created_at);
            })
            ->addColumn('image', function ($item) {
                return '<img style="width:35px !important;" src="' . asset('storage/images/' . $item->image) . '"></img>';

            })
            ->rawColumns(['action', 'image'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('counter.create')) {
            abort(401);
        }
        $data = [
            'menu' => 'company',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.company.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('company.create')) {
            abort(401);
        }

        $categories_id = json_encode($request->input('category_select'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'contact' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'ogImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($request->hasFile('company_image')) {
            $request['image'] = Helper::handleImageUpload($request->file('company_image'));
        }
        if ($request->hasFile('ogimage')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('ogimage'));
        }

        $conpany = Obj::create($request->all());

        return response()->json(['success' => 'Record is successfully added']);
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
    public function edit(string $id)
    {
        if (!auth()->user()->can('company.edit')) {
            abort(401);
        }

        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'company',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
        ];
        return view('admin.company.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!auth()->user()->can('company.edit')) {
            abort(401);
        }

        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:companies,name,' . $record->id,
            'contact' => 'required',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'ogImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);

        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('company_image')) {
            $request['image'] = Helper::handleImageUpload($request->file('company_image'), $record->image);
        }

        if ($request->hasFile('ogImage')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }

        $record->update($request->all());

        return response()->json(['success' => 'Record is successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('company.delete')) {
            abort(401);
        }
        try {
            $company = Obj::findOrFail($request->input('id'));

            $services = DB::table('services')->get();
            $companyInServices = false;
            foreach ($services as $services) {
                $company_ids = json_decode($services->company_id, true);
                if (is_array($company_ids) && in_array($request->input('id'), $company_ids)) {
                    $companyInServices = true;
                    break;
                }
            }

            if ($companyInServices) {
                return response()->json(['success' => false, 'message' => 'Service is associated with this company and cannot be deleted']);
            }

            $company->delete();

            return response()->json(['success' => true, 'message' => 'Company deleted successfully']);
        } catch (\Exception $e) {
            \Log::error("Error deleting Company: ", ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while trying to delete the Company']);
        }
    }
}
