<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductFile;
use App\Models\Settings;
use App\Models\TeamFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Session\Session;

class DataController extends Controller
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
        $type = $request->input('type');
        // dd($type);
        return $this->$type($request);
    }
    public function delete_product_file(Request $request)
    {
        $productFile = ProductFile::findOrFail($request->id);
        if (!is_null($productFile->file)) {
            Storage::disk('public')->delete('images/' . $productFile->file);
            Storage::disk('public')->delete('thumb/' . $productFile->file);
        }
        $productFile->delete();
    }

    public function assign_role(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $old_role = $user->getRoleNames()->first();
        if ($old_role != null) {
            $user->removeRole($old_role);
        }

        $role = Role::find($request->input('role_id'));
        $user->assignRole($role->name);
        return response()->json(['success' => 'Record is successfully updated']);
    }

    public function delete_team_file(Request $request)
    {
        $teamFile = TeamFile::findOrFail($request->id);
        $team_id = $teamFile->team_id;
        if (!is_null($teamFile->file)) {
            Storage::disk('public')->delete('images/' . $teamFile->file);
            Storage::disk('public')->delete('thumb/' . $teamFile->file);
        }
        $teamFile->delete();
        return response()->json([
            'team_id' => $team_id,
        ]);
    }

    public function update_settings(Request $request)
    {
        // dump($request->all());
        $record = Settings::find($request->input('id'));

        if (!$record) {
            return response()->json(['error' => 'Settings record not found'], 404);
        }

        $validator = \Validator::make($request->all(), [
            'siteName' => 'required|max:200',
            'email' => 'nullable|email',
            'logo_image' => 'nullable|image|mimes:svg|max:2048',
            'icon_image' => 'nullable|image|mimes:svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $data = $request->all();

        if ($request->hasFile('logo_image')) {
            $data['logo'] = $this->handleImageUpload($request->file('logo_image'), $record->logo);
        }

        if ($request->hasFile('icon_image')) {
            $data['icon'] = $this->handleImageUpload($request->file('icon_image'), $record->icon);
        }
        // dump($data);
        $record->update($data);
        // dd($record);
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
