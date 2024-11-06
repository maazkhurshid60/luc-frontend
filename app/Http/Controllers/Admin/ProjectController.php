<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Project as Obj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'menu' => 'project',
            'settings' => DB::table('settings')->first(),
        ];

        return view('admin.project.index', $data);
    }

    public function datatable(Request $request)
    {
        $items = Obj::select('*');

        return datatables($items)
            ->addColumn('action', function ($item) {

                $action = '<a href="' . route('project.edit', $item->id) . '"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                $action .= '<a href="javascript:delete_record(' . $item->id . ')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                return $action;
            })
            ->editColumn('image', function ($item) {
                return "<img width=55 src='" . asset('storage/images/' . $item->cover_image) . "'>";
            })
            ->editColumn('category_id', function ($item) {
                return $item->category->title;
            })
            ->editColumn('date', function ($item) {
                return setDate($item->date);
            })

            ->rawColumns(['action', 'image', 'date'])
            ->toJson();
    }

    public function create()
    {
        $data = [
            'menu' => 'project',
            'display_order' => Obj::max('display_order') + 1,
            'settings' => DB::table('settings')->first(),
        ];
        return view('admin.project.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->gallery_images);
        $categories_id = json_encode($request->input('category_select'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'detial_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'category_select' => 'required',
            'display_order' => 'required',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'sections-group.*.input' => 'required|string',
            'sections-group.*.text' => 'required|string',
            'sections-group.*.section_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',

        ]);

        $request['slug'] = Str::slug($request->post('slug'), '-');
        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;
        $request['category_id'] = $request['category_select'][0];
        $request['categories_id'] = $categories_id;

        if (empty($request->input('color_code'))) {
            $request['color_code'] = '#daddff';
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('image')) {
            $request['cover_image'] = Helper::handleImageUpload($request->file('image'));
        }
        if ($request->hasFile('detail_image')) {
            $request['details_image'] = Helper::handleImageUpload($request->file('detail_image'));
        }
        if ($request->hasFile('og_image')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('og_image'));
        }

        $uploaded_images = [];
        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as $file) {
                $uploaded_images[] = Helper::handleImageUpload($file);
            }
        }

        $request['gallery_images'] = json_encode($uploaded_images);

        $sections = $request->input('sections-group', []);
        $sectionsData = [];

        foreach ($sections as $index => $section) {
            $imagePath = null;

            if ($request->hasFile("sections-group.$index.section_image")) {
                $imagePath = Helper::handleImageUpload($request->file("sections-group.$index.section_image"));
            }

            $sectionsData[] = [
                'section_heading' => $section['input'],
                'section_text' => $section['text'],
                'section_image' => $imagePath,
            ];
        }

        $request['section_data'] = json_encode($sectionsData);

        $project = Obj::create($request->all());

        return response()->json(['success' => 'Record is successfully added']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $element = Obj::findOrFail($id);
        $data = [
            'menu' => 'project',
            'settings' => DB::table('settings')->first(),
            'data' => $element,
            'sectionData' => json_decode($element->section_data),
        ];
        return view('admin.project.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $categories_id = json_encode($request->input('category_select'));
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'detail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'category_select' => 'required',
            'display_order' => 'required',
            'gallery_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'sections-group.*.input' => 'required|string',
            'sections-group.*.text' => 'required|string',
            'sections-group.*.section_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        $request['search_engine'] = $request->has('search_engine') ? 1 : 0;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($request->hasFile('file')) {
            $request['image'] = Helper::handleImageUpload($request->file('file'), $record->image);
        }
        if ($request->hasFile('file2')) {
            $request['image2'] = Helper::handleImageUpload($request->file('file2'), $record->image);
        }
        if ($request->hasFile('file4')) {
            $request['og_image'] = Helper::handleImageUpload($request->file('file4'), $record->og_image);
        }

        // Handle gallery images
        $existingImages = json_decode($record->gallery_images) ?? [];
        $uploaded_images = [];

        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as $key => $file) {
                $uploaded_images[] = Helper::handleImageUpload($file, $existingImages[$key] ?? null);
            }
        } else {
            $uploaded_images = $existingImages;
        }

        $request['gallery_images'] = json_encode($uploaded_images);

        $request['category_id'] = $request['category_select'][0];
        $request['categories_id'] = $categories_id;

        if (empty($request->input('color_code'))) {
            $request['color_code'] = '#daddff';
        }

        $sections = $request->input('sections-group', []);
        $record_section_data = json_decode($record->section_data, true) ?? [];
        $sections_data = [];

        foreach ($sections as $index => $section) {
            $imagePath = null;

            if ($request->hasFile("sections-group.$index.section_image")) {
                $imagePath = Helper::handleImageUpload($request->file("sections-group.$index.section_image"));
            } else {
                if (isset($record_section_data[$index]) && !empty($record_section_data[$index]['section_image'])) {
                    $imagePath = $record_section_data[$index]['section_image'];
                }
            }

            $sections_data[] = [
                'section_heading' => $section['input'],
                'section_text' => $section['text'],
                'section_image' => $imagePath,
            ];
        }

        $request['section_data'] = json_encode($sections_data);

        $record->update($request->all());

        if ($request->hasFile('header_image')) {
            $extension = $request->header_image->getClientOriginalExtension();

            if ($extension == 'svg') {
                return response()->json(['errors' => ['Header image format not supported.']]);
            }

            $temp_name = $request->file('header_image')->store('images', 'public');
            $image = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/' . $image))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(config('constants.store_thumb_path') . $image);

            if (!is_null($record->header_image)) {
                Storage::disk('public')->delete('images/' . $record->header_image);
                Storage::disk('public')->delete('thumb/' . $record->header_image);
            }
            $record->header_image = $image;
            $record->save();
        }
        return response()->json(['success' => 'Record is successfully Updated']);
    }

    public function destroy(Request $request, $id)
    {
        $record = Obj::findOrFail($request->input('id'));
        if (!is_null($record->image)) {
            Storage::disk('public')->delete('images/' . $record->image);
            Storage::disk('public')->delete('thumb/' . $record->image);
        }
        if (!is_null($record->header_image)) {
            Storage::disk('public')->delete('images/' . $record->header_image);
            Storage::disk('public')->delete('thumb/' . $record->header_image);
        }
        $record->delete();
        return back()->with('success', 'Record Deleted successfully');
    }

}
