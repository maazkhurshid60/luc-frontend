<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HireProController;
use App\Http\Controllers\OurReachController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JourneyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutusEditsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\QuoteationFormController;
use App\Http\Controllers\Admin\ProjectCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes(['register' => false, 'reset' => false]);

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
        Route::post('/data', [DataController::class, 'index'])->name('data.index');
        Route::post('/about-details-edits', [AboutusEditsController::class, 'HandlerforAbout'])->name('aboutdetails.store');
        Route::get('quotationform/{id}', [QuoteationFormController::class, 'destroy'])->name('quotationform.delete');

        Route::resource('/menu', MenuController::class);
        Route::resource('/announcement', AnnouncementController::class);
        Route::resource('/blog', BlogController::class);
        Route::resource('/faq', FaqController::class);
        Route::resource('/faq-category', FaqCategoryController::class);
        Route::resource('/product', ProductController::class);
        Route::resource('/project', ProjectController::class);
        Route::resource('/project-category', ProjectCategoryController::class);
        Route::resource('/blog-category', BlogCategoryController::class);
        Route::resource('/service', ServiceController::class);
        // Route::post('/update-label', [TeamController::class, 'updateLabel'])->name('team.updateLabel');
        Route::resource('/testimonial', TestimonialController::class);
        Route::resource('/job-category', JobCategoryController::class);
        Route::resource('/job', JobController::class);
        Route::resource('/application', ApplicationController::class);
        Route::get('/settings', [Dashboard::class, 'settings'])->name('settings.index');
        Route::get('/aboutus-details', [AboutusEditsController::class, 'index'])->name('aboutdetails.index');
        Route::resource('/quoteationform', QuoteationFormController::class);
        Route::resource('/journey', JourneyController::class);
        Route::resource('/activity-log', ActivityController::class);
        Route::resource('/company', CompanyController::class);
        Route::resource('/role', RoleController::Class);
        Route::resource('/user', UserController::Class);
        Route::put('password/{user}', [UserController::class, 'updatePassword'])->name('user.update.password');
    });

Route::prefix('admin/datatable')
    ->middleware('auth')
    ->group(function () {
        Route::get('/menu', [MenuController::class, 'datatable'])->name('menu.datatable');
        Route::get('/announcement', [AnnouncementController::class, 'datatable'])->name('announcement.datatable');
        Route::get('/blog', [BlogController::class, 'datatable'])->name('blog.datatable');
        Route::get('/faq', [FaqController::class, 'datatable'])->name('faq.datatable');
        Route::get('/faq-category', [FaqCategoryController::class, 'datatable'])->name('faq-category.datatable');
        Route::get('/product', [ProductController::class, 'datatable'])->name('product.datatable');
        Route::get('/project', [ProjectController::class, 'datatable'])->name('project.datatable');
        Route::get('/project-category', [ProjectCategoryController::class, 'datatable'])->name('project-category.datatable');
        Route::get('/blog-category', [BlogCategoryController::class, 'datatable'])->name('blog-category.datatable');
        Route::get('/service', [ServiceController::class, 'datatable'])->name('service.datatable');
        Route::get('/testimonial', [TestimonialController::class, 'datatable'])->name('testimonial.datatable');
        Route::get('/job-category', [JobCategoryController::class, 'datatable'])->name('job-category.datatable');
        Route::get('/job', [JobController::class, 'datatable'])->name('job.datatable');
        Route::get('/application', [ApplicationController::class, 'datatable'])->name('application.datatable');
        Route::get('/quotation-form', [QuoteationFormController::class, 'datatable'])->name('quotation-form.datatable');
        Route::get('/journey', [JourneyController::class, 'datatable'])->name('journey.datatable');
        Route::get('/activity', [ActivityController::class, 'datatable'])->name('activity.datatable');
        Route::get('/company', [CompanyController::class, 'datatable'])->name('company.datatable');
        Route::get('/role', [RoleController::class, 'datatable'])->name('role.datatable');
        Route::get('/user', [UserController::class, 'datatable'])->name('user.datatable');
    });

Route::post('ckeditor/image_upload', [Dashboard::class, 'upload'])->name('upload');

Route::get('clients', [ClientsController::class, 'index'])->name('clients.index');

Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('blog/{slug}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('/companies', [ServicesController::class, 'index'])->name('companies.index');
Route::get('/company/{slug}', [ServicesController::class, 'details'])->name('company.details');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
Route::get('/our-reach', [OurReachController::class, 'index'])->name('our-reach.index');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');

Route::get('projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('projects/{slug}', [ProjectsController::class, 'details'])->name('projects.details');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('career.show');
Route::post('/job-apply', [CareerController::class, 'submit_application'])->name('careers.submit_application');

Route::post('/contact-us', [HomeController::class, 'feedback_submit'])->name('contact_us.submit');
Route::post('/submit-form', [HomeController::class, 'submitForm'])->name('submitForm');

Route::get('/change-language', [HomeController::class, 'changeLanguage'])->name('change-language');

Route::any('/{slug}', [HomeController::class, 'pages']);
