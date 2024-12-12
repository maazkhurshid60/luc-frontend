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
    public function index()
    {
        $data = [
            'menu' => 'settings',
            'about_details' => DB::table('aboutus_edits')->get()->first(),
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
        $record = AboutusEdits::find($request->input('id'));

        if (!$record) {
            return response()->json(['error' => 'Settings record not found'], 404);
        }

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

        $data = $request->all();

        if ($request->hasFile('journeyimg')) {
            $data['journey_img'] = $this->handleImageUpload($request->file('journeyimg'), $record->journey_img);
        }

        if ($request->hasFile('visionimg')) {
            $data['vision_img'] = $this->handleImageUpload($request->file('visionimg'), $record->vision_img);
        }

        $record->update($data);

        return response()->json(['success' => 'Settings Updated']);
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

        Image::make($imagePath)->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath);

        if ($oldImage) {
            Storage::disk('public')->delete('images/' . $oldImage);
            Storage::disk('public')->delete('thumb/' . $oldImage);
        }

        return $fileName;
    }
}
