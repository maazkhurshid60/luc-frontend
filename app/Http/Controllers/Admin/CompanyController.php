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
        $lang = 'en';
        $data = [
            'menu' => 'company',
            'settings' => DB::table('settings')->first(),
            'lang' => $lang,
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
                $action .= '
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs">Edit</button>
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                ';
                if (auth()->user()->can('company.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('company.edit', $item->id) . '?lang=en">Edit (EN)</a>';
                }
                if (auth()->user()->can('company.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('company.edit', $item->id) . '?lang=fr">French</a>';
                }
                $action .= '</div></div>';
                if (auth()->user()->can('company.delete')) {
                    $action .= '<a class="btn btn-danger btn-xs ml-2" href="javascript:void(0)" onclick="delete_record(' . $item->id . ')">Delete</a>';
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
        // dd($request->all());
        $categories_id = json_encode($request->input('category_select'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'required|string',
            'contact' => 'required|string',
            'short_description' => 'required|string',
            'company_email' => 'required|email',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'ogimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'company_icon' => 'nullable|image|mimes:svg|max:1024',
            'page_title' => 'nullable|string|max:80',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string|max:180',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_type' => 'nullable|string',
            'display_order' => 'required|integer|min:1',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
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
        if ($request->hasFile('company_icon')) {
            $request['companyIcon'] = Helper::handleImageUpload($request->file('company_icon'));
        }
        // dump($request->all());
        $conpany = Obj::create($request->all());
        // dd($conpany);
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
    public function edit(Request $request, string $id)
    {
        // dd($request->all());
        if (!auth()->user()->can('company.edit')) {
            abort(401);
        }
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'company',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'lang' => $lang,
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
            'contact' => 'required|string',
            'short_description' => 'required|string',
            'company_email' => 'required|email',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'ogimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'company_icon' => 'nullable|image|mimes:svg|max:1024',
            'page_title' => 'nullable|string|max:80',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string|max:180',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_type' => 'nullable|string',
            'display_order' => 'required|integer|min:1',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
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
        if ($request->hasFile('company_icon')) {
            $request['companyIcon'] = Helper::handleImageUpload($request->file('company_icon'), $record->companyIcon);
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
            \Log::error('Error deleting Company: ', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while trying to delete the Company']);
        }
    }
}
