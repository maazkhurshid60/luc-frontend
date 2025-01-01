<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Menu;
use App\Models\Project;
use App\Models\Application;
use App\Models\JobCategory;
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
            'data' => Menu::where('slug', 'careers')->first(),
            'categories' => JobCategory::where('status', 'active')->latest()->get(),
            'jobs' => Job::where('status', 'active')->latest()->paginate(20),
            'count' => Job::count(),
            'settings' => DB::table('settings')->find(1),
        ];
        // dd($data);
        // if (is_null($data['data'])) {
        //     return 'No page found in database';
        // }
        return view('careers', $data);
        // return view('career-details', $data);
    }

    public function show($slug)
    {
        $job = Job::where('status', 'active')->where('slug', $slug)->get()->first();

        if (is_null($job)) {
            return view('errors.404');
        }

        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'settings' => DB::table('settings')->find(1),
            'page' => $job,

        ];

        return view('career-details', compact('data'));

    }
    public function submit_application(Request $request)
    {
        // Validate the incoming request
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'job_id' => 'required',
            'email' => 'required|email:rfc,dns',
            'contact_no' => 'required|numeric',
            'description' => 'required',
            'cv_file' => 'required|mimes:doc,docx,pdf|max:1024',
        ], [
            'name.required' => 'Please provide your name',
            'job_id.required' => 'Something went wrong! Please try again.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'contact_no.required' => 'The contact number is required.',
            'contact_no.numeric' => 'Please provide a valid contact number.',
            'description.required' => 'The cover letter field is required.',
            'cv_file.required' => 'Please upload your CV.',
            'cv_file.mimes' => 'The CV must be a file of type: doc, docx, or pdf.',
            'cv_file.max' => 'The CV size must not exceed 1MB.',
        ]);
    
        // Return validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Handle the file upload
        $fileName = null;
        if ($request->hasFile('cv_file')) {
            $tempName = $request->file('cv_file')->store('applications/cvs', 'public');
            $fileName = str_replace('applications/cvs/', '', $tempName);
        }
    
        // Prepare the data for insertion
        $applicationData = $request->only(['name', 'job_id', 'email', 'contact_no', 'description']);
        $applicationData['file'] = $fileName;
    
        // Save the application to the database
        Application::create($applicationData);
    
        // Return success response
        return response()->json([
            'success' => 'Your application has been successfully submitted. We will get in touch with you after reviewing.'
        ]);
    }
    
}
