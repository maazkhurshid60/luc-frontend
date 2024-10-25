<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Blog;
use App\Models\Client;
use App\Models\FaqCategory;
use App\Models\Feedback;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Only for updating Code & Database
     * @return [type] [description]
     */
    protected function updates()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
        \Artisan::call('view:cache');
        // \DB::statement("ALTER TABLE `products` ADD `link` VARCHAR(222) NULL DEFAULT NULL AFTER `title`");
        // \DB::statement("CREATE TABLE `address` ( `id` INT NOT NULL , `city` VARCHAR(255) NULL , `address` TEXT NULL , `phone` VARCHAR(111) NULL , `email` VARCHAR(111) NULL , `map` VARCHAR(500) NULL , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        // \DB::statement("ALTER TABLE `address` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT");
        // \DB::statement("ALTER TABLE `jobs` ADD `header_image` VARCHAR(255) NULL DEFAULT NULL AFTER `file`");
        // \DB::statement("ALTER TABLE `feedback` ADD `services` TEXT NULL DEFAULT NULL AFTER `created_at`");
        // \DB::statement("ALTER TABLE `projects` ADD `header_image` VARCHAR(111) NULL AFTER `image2`");
    }

    public function index()
    {
        $clients = Client::where('status', 'Active')->orderBy('display_order')->get();
        $clientsChunked = $clients->chunk(ceil($clients->count() / 3));
        // $this->updates();
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => Menu::where('slug', 'home')->first(),
            'service_menu' => Menu::where('slug', 'services')->first(),
            'slides' => Slider::where('status', 'active')->latest()->get(),
            'services' => Service::where('status', 'active')->orderBy('display_order', 'asc')->latest()->get(),
            'projectCategories' => ProjectCategory::whereNull('parent_id')->get(),
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'blogs' => Blog::where('status', 'active')->orderBy('display_order', 'asc')->latest()->take(3)->get(),
            'testimonials' => Testimonial::where('status', 'active')->latest()->get(),
            'team' => Team::where('status', 'active')->latest()->take(4)->get(),
            'clients' => Client::where('status', 'Active')->latest()->get(),
            'products' => Product::where('status', 'active')->latest()->get(),

            'label' => [
                'services' => Menu::where('slug', 'services')->first(),
                'portfolio' => Menu::where('slug', 'portfolio')->first(),
                'blog' => Menu::where('slug', 'blog')->first(),
                'testimonial' => Menu::where('slug', 'testimonial')->first(),
                'team' => Menu::where('slug', 'team')->first(),
                'clients' => Menu::where('slug', 'clients')->first(),
            ],
        ];

        $services = Service::where('status', 'active')->take(3)->get();

        return view('home', $data, compact('services', 'clientsChunked'));
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

        $page = Menu::where('slug', $slug)->where('display', 'yes')->get()->first();

        if (is_null($page)) {
            return $this->PageNotFound();
        }
        $data = [
            'settings' => DB::table('settings')->find(1),
            'page' => $page,
        ];

        if (!View::exists('page/' . $slug)) {
            // If view does not exist, redirect to another page
            return view('dynamic-page', $data);
        }

        // Render the view for the specific slug
        return view('page/' . $slug, compact('data'));
    }

    public function feedback_submit(Request $request)
    {

        if (is_null($request->input('g-recaptcha-response'))) {
            return response()->json(['success' => 'false', 'message' => 'Captcha Verification Failed! Please Complete Captcha to Continue.'], 422);
        }

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
