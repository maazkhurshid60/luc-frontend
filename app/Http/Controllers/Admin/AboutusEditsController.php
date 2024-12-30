<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use App\Models\AboutusEdits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutusEditsController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->lang ?? 'en';
        $aboutDetails = DB::table('aboutus_edits')->first();
    
        // Decode the JSON fields based on language
        if ($aboutDetails) {
            $aboutDetails->journey_heading = json_decode($aboutDetails->journey_heading, true)[$lang] ?? '';
            $aboutDetails->vision_heading = json_decode($aboutDetails->vision_heading, true)[$lang] ?? '';
            $aboutDetails->vision_desc = json_decode($aboutDetails->vision_desc, true)[$lang] ?? '';
        }
    
        $data = [
            'menu' => 'settings',
            'about_details' => $aboutDetails,
            'lang' => $lang,
        ];
    
        return view('admin.about-details.index', $data);
    }
    

    public function HandlerforAbout(Request $request)
    {
        $type = $request->input('type');
        return $this->$type($request);
    }

    public function update(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'journey_heading' => 'required|max:200',
            'vision_heading' => 'required',
            'vision_desc' => 'required',
            'journeyimg' => 'nullable|image|mimes:webp|max:2048',
            'visionimg' => 'nullable|image|mimes:webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Prepare the data
        $data = $request->except(['journeyimg', 'visionimg']);

        // Handle image uploads
        if ($request->hasFile('journeyimg')) {
            $data['journey_img'] = $this->handleImageUpload($request->file('journeyimg'), $request->journey_img ?? null);
        }

        if ($request->hasFile('visionimg')) {
            $data['vision_img'] = $this->handleImageUpload($request->file('visionimg'), $request->vision_img ?? null);
        }

        // Update or create record
        $record = AboutusEdits::updateOrCreate(
            ['id' => $request->input('id')], // Matching condition
            $data, // Data to update or insert
        );

        return response()->json(['success' => $record->wasRecentlyCreated ? 'Record Created' : 'Record Updated']);
    }

    private function handleImageUpload($image, $oldImage = null)
    {
        $extension = $image->getClientOriginalExtension();

        if ($extension == 'svg') {
            $tempName = $image->store('images', 'public');
            $fileName = str_replace('images/', '', $tempName);

            if ($oldImage) {
                Storage::disk('public')->delete('images/' . $oldImage);
                Storage::disk('public')->delete('thumb/' . $oldImage);
            }

            return $fileName;
        }

        $tempName = $image->store('images', 'public');
        $fileName = str_replace('images/', '', $tempName);

        $imagePath = public_path('storage/images/' . $fileName);
        $thumbPath = config('constants.store_thumb_path') . $fileName;

        Image::make($imagePath)
            ->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($thumbPath);

        if ($oldImage) {
            Storage::disk('public')->delete('images/' . $oldImage);
            Storage::disk('public')->delete('thumb/' . $oldImage);
        }

        return $fileName;
    }
}
