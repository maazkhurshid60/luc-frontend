<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Helpers\Helper;
use App\Models\Service;
use App\Models\Blog as Obj;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
    public function index(Request $request)
    {
        if (!auth()->user()->can('blog.view')) {
            abort(401);
        }

        $data = [
            'lang' => 'en',
            'menu' => 'blog',
            'settings' => DB::table('settings')->first(),
        ];
        // dd($data);
        return view('admin.blog.index', $data);
    }
    public function datatable(Request $request)
    {
        if (!auth()->user()->can('blog.view')) {
            abort(401);
        }

        // Fetch all items
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
                if (auth()->user()->can('blog.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('blog.edit', $item->id) . '?lang=en">Edit (EN)</a>';
                }
                if (auth()->user()->can('blog.edit')) {
                    $action .= '<a class="dropdown-item" href="' . route('blog.edit', $item->id) . '?lang=fr">French</a>';
                }
                $action .= '</div></div>';
                if (auth()->user()->can('blog.delete')) {
                    $action .= '<a class="btn btn-danger btn-xs ml-2" href="javascript:void(0)" onclick="delete_record(' . $item->id . ')">Delete</a>';
                }

                return $action;
            })
            ->editColumn('created_at', function ($item) {
                return \App\Helpers\Helper::setDate($item->created_at);
            })
            ->editColumn('image', function ($item) {
                return "<img width='55' src='" . asset('storage/images/' . $item->cover_image) . "'>";
            })
            ->rawColumns(['action', 'image'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('blog.create')) {
            abort(401);
        }
        $data = [
            'menu' => 'blog',
            'settings' => DB::table('settings')->first(),
            'BlogCategory' => BlogCategory::all(),
            'services' => Service::all(),
        ];
        return view('admin.blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('blog.create')) {
            abort(401);
        }
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'contents' => 'required|string',
            'file3' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $request['slug'] = Str::slug($request->post('title'), '-');

        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'));
        }
        if ($request->hasFile('file3')) {
            $request['cover_image'] = Helper::handleImageUpload($request->file('file3'));
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'));
        }

        $data = [
            'title' => ['en' => $request->input('title')],
            'short_description' => ['en' => $request->input('short_description')],
            'contents' => ['en' => $request->input('contents')],
            'page_title' => ['en' => $request->input('page_title', '')],
            'meta_keywords' => ['en' => $request->input('meta_keywords', '')],
            'meta_description' => ['en' => $request->input('meta_description', '')],
            'og_title' => ['en' => $request->input('og_title', '')],
            'og_description' => ['en' => $request->input('og_description', '')],
            'og_type' => ['en' => $request->input('og_type', 'article')],

            'slug' => $request->input('slug'),
            'image' => $request->input('image', null),
            'cover_image' => $request->input('cover_image', null),
            'og_image' => $request->input('og_image', null),
            'service_id' => json_encode($request->input('service_id', [])),
            'category_id' => $request->input('category_id'),
            'search_engine' => $request->has('search_engine') ? 1 : 0,
            'status' => $request->input('status'),
            'user' => $request->input('user'),
        ];

        $obj = Obj::create($data);

        return response()->json(['success' => 'Record is successfully added', 'id' => $obj->id]);
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
    public function edit(Request $request, $id)
    {
        if (!auth()->user()->can('blog.edit')) {
            abort(401);
        }

        // Ensure middleware sets the locale
        $lang = $request->lang ?? 'en';
        $element = Obj::findOrFail($id);

        $data = [
            'menu' => 'blog',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'BlogCategory' => BlogCategory::all(),
            'services' => Service::all(),
            'lang' => $lang,
        ];

        return view('admin.blog.edit', $data);
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
        if (!auth()->user()->can('blog.edit')) {
            abort(401);
        }

        $record = Obj::findOrFail($id);

        // Validate input
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'contents' => 'required|string',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Handle file uploads
        if ($request->hasFile('file')) {
            $imagePath = Helper::handleImageUpload($request->file('file'), $record->image);
            $record->image = $imagePath; // Update record's image field
        }

        if ($request->hasFile('file3')) {
            $coverImagePath = Helper::handleImageUpload($request->file('file3'), $record->cover_image);
            $record->cover_image = $coverImagePath; // Update record's cover image field
        }

        if ($request->hasFile('file4')) {
            $ogImagePath = Helper::handleImageUpload($request->file('file4'), $record->og_image);
            $record->og_image = $ogImagePath; // Update record's OG image field
        }

        // Update translations
        if ($request->lang == 'en') {
            $record->setTranslation('title', 'en', $request->input('title'));
            $record->setTranslation('short_description', 'en', $request->input('short_description'));
            $record->setTranslation('contents', 'en', $request->input('contents'));
            $record->setTranslation('page_title', 'en', $request->input('page_title'));
            $record->setTranslation('meta_keywords', 'en', $request->input('meta_keywords'));
            $record->setTranslation('meta_description', 'en', $request->input('meta_description'));
            $record->setTranslation('og_title', 'en', $request->input('og_title'));
            $record->setTranslation('og_description', 'en', $request->input('og_description'));
        }

        if ($request->lang == 'fr') {
            $record->setTranslation('title', 'fr', $request->input('title'));
            $record->setTranslation('short_description', 'fr', $request->input('short_description'));
            $record->setTranslation('contents', 'fr', $request->input('contents'));
            $record->setTranslation('page_title', 'fr', $request->input('page_title'));
            $record->setTranslation('meta_keywords', 'fr', $request->input('meta_keywords'));
            $record->setTranslation('meta_description', 'fr', $request->input('meta_description'));
            $record->setTranslation('og_title', 'fr', $request->input('og_title'));
            $record->setTranslation('og_description', 'fr', $request->input('og_description'));
        }

        // Update other fields
        $record->category_id = $request->input('category_id');
        $record->status = $request->input('status');
        $record->user = $request->input('author');
        // dd($record);
        $record->save();

        return response()->json(['success' => 'Record is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('blog.delete')) {
            abort(401);
        }
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->image)) {
            Storage::disk('public')->delete('images/' . $record->image);
            Storage::disk('public')->delete('thumb/' . $record->image);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }
}
