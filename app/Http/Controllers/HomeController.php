<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Team;
use App\Helpers\Helper;
use App\Mail\ContactUs;
use App\Models\Company;
use App\Models\Project;
use App\Models\Service;
use App\Models\Feedback;
use App\Models\Settings;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Models\QuoteationForm;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Only for updating Code & Database
     * @return [type] [description]
     */

    public function index()
    {
        $select = ['name', 'heading', 'short_description'];
        $data = [
            'settings' => Settings::find(1),
            'data' => Menu::where('slug', 'home')->first(),
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'latest_services' => Company::where('status', 'active')->latest()->take(4)->get(),
            'latest_blogs' => Blog::where('status', 'active')->latest()->take(3)->get(),
            'jobs' => Job::where('status', 'active')->whereDate('apply_before', '>=', Carbon::now())->latest()->take(4)->get(),
            'faqs' => Faq::where('status', 'active')->get(),
        ];

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
        QuoteationForm::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'service' => $data['service'] ?? null,
            'contact_no' => $data['phone'] ?? null,
            'message' => $data['message'],
            'type' => $data['type'],
        ]);

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
