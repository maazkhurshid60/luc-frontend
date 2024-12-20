<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Menu;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Job::where('status', 'active')->whereDate('apply_before', '>=', Carbon::now());

            if ($request->jobs) {
                $query->where('category_id', $request->jobs);
            }

            if ($request->keyword) {
                $query->where('title', 'like', '%' . $request->keyword . '%');
            }

            $jobs = $query->latest()->paginate(5);

            return response()->json([
                'jobs' => $jobs,
            ]);
        }

        $data = [
            'page' => Menu::where('slug', 'careers')->first(),
            'categories' => JobCategory::where('status', 'active')->latest()->get(),
            'jobs' => Job::where('status', 'active')->latest()->paginate(20),
        ];

        $settings = DB::table('settings')->find(1);
        if (is_null($data['page'])) {
            return 'No page found in database';
        }
        return view('careers', compact('data', 'settings'));
    }

    public function show($slug)
    {
        $job = Job::where('status', 'active')->where('slug', $slug)->get()->first();
        if (is_null($job)) {
            return $this->PageNotFound();
        }

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $job,

        ];

        return view('jobs_application', compact('data'));

    }
    public function submit_application(Request $request)
    {
        // if (is_null($request->input('g-recaptcha-response'))) {
        //     return response()->json(['errors' => ['Captcha Verification Failed! Please Complete Captcha to Continue.']], 422);
        // }

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'job_id' => 'required',
            'email' => 'required|email:rfc,dns',
            'contact_no' => 'required|numeric',
            'description' => 'required',
            'cv_file' => 'required|mimes:doc,docx,pdf|max:1024',
        ], [
            'name.required' => 'Please provide your name',
            'job_id.required' => 'Somthing wrong! Please try again.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'contact_no.required' => 'The contact number is required.',
            'contact_no.numeric' => 'Please provide a valid contact number.',
            'description.required' => 'The cover letter field is required.',
            'cv_file.required' => 'Please upload your CV.',
            'cv_file.mimes' => 'The CV must be a file of type: doc, docx, or pdf.',
            'cv_file.max' => 'The CV size must not exceed 1MB.',
        ]);
        

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        if ($request->hasFile('cv_file')) {

            $temp_name = $request->file('cv_file')->store('images', 'public');
            $request['file'] = str_replace('images/', '', $temp_name);
        }
        $obj = Application::create($request->all());
        return response()->json(['success' => 'Your application has been successfully submitted. Will get in touch with you after reviewing.']);
    }

    public function PageNotFound()
    {
        return view('errors.404');
    }
}
