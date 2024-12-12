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
use App\Mail\ContactUs;
use App\Models\Company;
use App\Models\Project;
use App\Models\Service;
use App\Models\Feedback;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Models\QuoteationForm;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\View;
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
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', 'home')->first(),
            // 'about_us' => Menu::where('slug', 'about-us')->first(),
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'latest_services' => Company::where('status', 'active')->latest()->take(4)->get(),
            'latest_blogs' => Blog::where('status', 'active')->latest()->take(3)->get(),
            'jobs' => Job::where('status', 'active')->whereDate('apply_before', '>=', Carbon::now())->latest()->take(4)->get(),
            'faqs' => Faq::where('status', 'active')->get(),

            'lables' => [
                'home' => Menu::where('slug', 'home')->select($select)->first(),
                'about_us' => Menu::where('slug', 'about-us')->select($select)->first(),
                'services' => Menu::where('slug', 'services')->select($select)->first(),
                'projects' => Menu::where('slug', 'projects')->select($select)->first(),
                'global_presense' => Menu::where('slug', 'global-presense')->select($select)->first(),
                'blogs' => Menu::where('slug', 'blogs')->select($select)->first(),
                'careers' => Menu::where('slug', 'careers')->select($select)->first(),
            ],
        ];
        // dd($data);
        if (!$data['data']) {
            return view('errors.404');
        }

        return view('home', $data);
    }

    public function services(Request $request)
    {
        $services = Service::where('status', 'active')->latest()->paginate(12);

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'services')->first(),
            'records' => $services,
        ];
        if (is_null($data['page'])) {
            return $this->PageNotFound();
        }

        return view('site.services', $data);
    }

    public function single_service($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 'active')->first();

        if (!$service) {
            throw new NotFoundHttpException();
        }

        $related = Blog::whereJsonContains('service_id', (string) $service->id)->latest()->where('status', 'active')->take(3)->get();

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $service,
            'related' => $related,
        ];

        if (is_null($service)) {
            return $this->PageNotFound();
        }

        // Check if the view exists for the specified slug
        if (!View::exists('services/' . $slug)) {
            // If view does not exist, redirect to another page
            return view('single_service', $data);
        }

        // Render the view for the specific slug
        return view('services/' . $slug, $data);
    }

    public function single_team($id)
    {
        $page = Team::where('status', 'active')->where('id', $id)->get()->first();
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $page,
        ];
        if (is_null($data['page'])) {
            return $this->PageNotFound();
        }
        return view('site.single_team', $data);
    }

    public function about_us(Request $request)
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'about-us')->first(),
            'top_team' => Team::where('status', 'active')->where('enable_fix', 1)->get(),
            'bottom_team' => Team::where('status', 'active')->where('enable_fix', 0)->latest()->get(),
            'label' => [
                'team' => Menu::where('slug', 'team')->first(),
            ],
        ];
        if (is_null($data['page'])) {
            return view('errors.404');
        }
        return view('site.about_us', $data);
    }

    public function contact_us(Request $request)
    {
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'contact-us')->first(),
            'addresses' => \App\Models\Address::all(),
            'hide_footer' => '1',
        ];
        if (is_null($data['page'])) {
            return view('errors.404');
        }

        return view('site.contact_us', $data);
    }

    public function blog(Request $request)
    {
        if (!is_null($request->input('q')) && $request->input('q') != '') {
            $blogs = Blog::where('status', 'active')
                ->where('title', 'like', '%' . $request->input('q') . '%')
                ->latest()
                ->paginate(12);
        } else {
            $blogs = Blog::where('status', 'active')->latest()->paginate(12);
        }

        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'blog')->orWhere('slug', 'technology-blogs')->first(),
            'blogs' => $blogs,
            'query' => $request->input('q'),
        ];
        if (is_null($data['page'])) {
            return $this->PageNotFound();
        }

        return view('site.blogs', $data);
    }

    public function single_blog($slug)
    {
        $blog = Blog::where('slug', $slug)->orWhere('slug', 'technology-blogs')->where('status', 'active')->first();
        if (is_null($blog)) {
            return $this->PageNotFound();
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $blog,
            'prev' => Blog::where('id', '<', $blog->id)
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->first(),
            'next' => Blog::where('id', '>', $blog->id)
                ->where('status', 'active')
                ->orderBy('id')
                ->first(),
            'recent_blog' => Blog::where('status', 'active')->latest()->get()->take(5),
        ];
        return view('site.single_blog', $data);
    }

    public function portfolio()
    {
        $page = Menu::where('slug', 'portfolio')->where('display', 'yes')->get()->first();
        if (is_null($page)) {
            return $this->PageNotFound();
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $page,
            'projectCategories' => ProjectCategory::latest()->get(),
            'projects' => Project::where('status', 'active')->latest()->get(),
        ];
        return view('site.portfolio', $data);
    }

    public function single_project($slug)
    {
        $page = Project::where('slug', $slug)->where('status', 'active')->get()->first();
        if (is_null($page)) {
            return $this->PageNotFound();
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $page,
        ];
        return view('site.single_project', $data);
    }

    public function faqs()
    {
        $page = Menu::where('slug', 'faqs')->where('display', 'yes')->get()->first();
        if (is_null($page)) {
            return $this->PageNotFound();
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $page,
            'categories' => FaqCategory::latest()->get(),
        ];
        return view('site.faqs', $data);
    }

    public function pages(Request $request, $slug)
    {
        if ($slug == 'home') {
            return redirect()->route('index');
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'data' => Menu::where('slug', $slug)->where('display', 'yes')->get()->first(),
            'categories' => FaqCategory::latest()->get(),
        ];

        if (is_null($data['data'])) {
            return $this->PageNotFound();
        }

        if (!View::exists('pages/' . $slug)) {
            return view('pages.dynamic-page', $data);
        }

        return view($slug);
    }

    public function feedback_submit(Request $request)
    {

        // if (is_null($request->input('g-recaptcha-response'))) {
        //     return response()->json(['success' => 'false', 'message' => 'Captcha Verification Failed! Please Complete Captcha to Continue.'], 422);
        // }

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|min:11',
            'service' => 'required|array',
            'technology' => 'required|array',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'errors' => $validator->errors()], 422);
        }

        $data = Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('phone'),
            'message' => $request->input('message'),
            'services' => json_encode($request->input('service')),
            'technologies' => json_encode($request->input('technology')),
        ]);

        $data['services'] = json_decode($data['services']);
        $data['technologies'] = json_decode($data['technologies']);

        // $when = now()->addMinutes(1);
        // $when = now()->addMinutes(1);
        // Mail::to('sales@redstartechs.com')->later($when, new ContactUs($data));
        Mail::to('sales@redstartechs.com')->send(new ContactUs($data));

        return response()->json(['response' => 'success', 'message' => 'We have received your email, We will respond soon']);
    }
    public function quoteform(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255', // Allow subject to be nullable since we might set it dynamically
        'service' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'message' => 'required|string|max:1000',
        'type' => 'required|string|in:quote_form,contact_form,project_form',
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
    }

    // Dynamically set the subject based on type
    $data = $request->all(); // Get all input fields as an array
    if ($request->type === 'project_form') {
        $data['subject'] = 'This form is from the project form';
    }

    // Store form data
    QuoteationForm::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'subject' => $data['subject'],
        'service' => $data['service'] ?? null, // Handle nullable fields gracefully
        'contact_no' => $data['phone'] ?? null,
        'message' => $data['message'],
        'type' => $data['type'],
    ]);

    return response()->json(['response' => 'success', 'message' => 'We have received your email, We will respond soon']);
}

    public function PageNotFound()
    {
        // $page = Menu::where('slug', '404')->where('display', 'yes')->get()->first();
        // if (is_null($page)) {
        //     $page = (object) [
        //         'page_title' => 'Page Not found',
        //         'slug' => '404',
        //         'meta_keywords' => null,
        //         'meta_description' => null,
        //     ];
        // }
        // $data = [
        //     'settings' => DB::table('settings')->find(1),
        //     'page' => $page,
        // ];
        // return view('site.404', $data);
        return view('errors.404');
    }

    public function getTechnologies(Request $request)
    {
        $services = $request->input('service', []);
        if (!is_array($services)) {
            $services = [];
        }

        $allOptions = \App\Helpers\Helper::getTechnologiesOptions();

        $filteredOptions = [];
        $headings = [];

        foreach ($services as $service) {
            if (isset($allOptions[$service])) {
                $filteredOptions[$service] = $allOptions[$service];
                $headings[] = ucwords(str_replace('_', ' ', $service));
            }
        }

        return response()->json([
            'options' => $filteredOptions,
            'headings' => $headings,
        ]);
    }
}
