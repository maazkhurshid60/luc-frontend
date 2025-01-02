<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'settings' => DB::table('settings')->get()->first(),
            'counter' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'blogs' => Blog::count(),
            ],
        ];
        return view('admin.index', $data);
    }
    public function settings(Request $request)
    {
        $lang = $request->lang ?? 'en';
        $settings = Settings::find(1);
        $data = [
            'menu' => 'settings',
            'settings' => $settings,
            'lang' => $lang,
        ];
        return view('admin.settings', $data);
    }
    

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
