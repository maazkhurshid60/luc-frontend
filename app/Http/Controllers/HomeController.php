<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Team;
use App\Mail\Contact;
use App\Helpers\Helper;
use App\Mail\ContactUs;
use App\Models\Company;
use App\Models\Project;
use App\Models\Service;
use App\Models\Feedback;
use App\Models\Settings;
use App\Models\FaqCategory;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\QuoteationForm;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Only for updating Code & Database
     * @return [type] [description]
     */

    public function index(Request $request)
    {
        // Check if user is new via cookie
        $isNewUser = !$request->cookie('visited_before');
        // Get active announcement
        $activeAnnouncement = Announcement::where('status', 'active')->whereDate('start_date', '<=', now())->whereDate('end_date', '>=', now())->first();

        // Fetch required data for the homepage
        $select = ['name', 'heading', 'short_description'];
        $data = [
            'settings' => Settings::find(1),
            'data' => Menu::where('slug', 'home')->first(),
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'latest_services' => Company::where('status', 'active')->latest()->take(4)->get(),
            'latest_blogs' => Blog::where('status', 'active')->latest()->take(3)->get(),
            'jobs' => Job::where('status', 'active')->whereDate('apply_before', '>=', now())->latest()->take(4)->get(),
            'faqs' => Faq::where('status', 'active')->get(),
            'isNewUser' => $isNewUser,
            'activeAnnouncement' => $activeAnnouncement,
        ];
        // Handle missing data for the homepage
        if (!$data['data']) {
            abort(404);
        }

        return view('home', $data);
    }

    public function submitForm(Request $request)
    {
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        if ($request->type === 'project_form') {
            $data['subject'] = 'This form is from the project form';
        }

        // Store form data
       $quotation =  QuoteationForm::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'service' => $data['service'] ?? null,
            'contact_no' => $data['phone'] ?? null,
            'message' => $data['message'],
            'type' => $data['type'],
        ]);
        $mail_data = [
            'name' => $quotation->name,
            'email' => $quotation->email,
            'subject' => $quotation->subject,
            'service' => $quotation->service ?? null,
            'contact_no' => $quotation->phone ?? null,
            'message' => $quotation->message,
            'type' => $quotation->type,
        ];
        Mail::to('noor.redstar@gmail.com')->send(new Contact($mail_data));
        return response()->json(['response' => 'success', 'message' => 'We have received your email, We will respond soon']);
    }

    public function pages()
    {
        abort(404);
    }

    public function PageNotFound()
    {
        abort(404);
    }
}
