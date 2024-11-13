<?php

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
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\TeamFileController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\ProductFileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\HiringApplicationController;

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

Route::post('/contact-us', [HomeController::class, 'feedback_submit'])->name('contact_us.submit');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::post('/data', [DataController::class, 'index'])->name('data.index');

    // In your web.php or api.php
    Route::get('/featured-projects', [ServiceController::class, 'getFeaturedProjects'])->name('featured.projects');

    // Resource Routes
    Route::resource('/menu', MenuController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/faq-category', FaqCategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/project', ProjectController::class);
    Route::resource('/project-category', ProjectCategoryController::class);
    Route::resource('/blog-category', BlogCategoryController::class);
    Route::resource('/service', ServiceController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/team', TeamController::class);
    Route::post('/update-label', [TeamController::class, 'updateLabel'])->name('team.updateLabel');
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/counter', CounterController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/address', AddressController::class);
    Route::resource('/job', JobController::class);
    Route::resource('/application', ApplicationController::class);
    Route::resource('/product-file', ProductFileController::class);
    Route::resource('/team-file', TeamFileController::class);
    Route::get('/settings', [Dashboard::class, 'settings'])->name('settings.index');
    Route::resource('/hiring-application', HiringApplicationController::class);
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/role', RoleController::Class);
    Route::resource('/user', UserController::Class);
    Route::put('password/{user}', [UserController::class, 'updatePassword'])->name('user.update.password');

});

Route::prefix('admin/datatable')->middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'datatable'])->name('menu.datatable');
    Route::get('/blog', [BlogController::class, 'datatable'])->name('blog.datatable');
    Route::get('/faq', [FaqController::class, 'datatable'])->name('faq.datatable');
    Route::get('/faq-category', [FaqCategoryController::class, 'datatable'])->name('faq-category.datatable');
    Route::get('/product', [ProductController::class, 'datatable'])->name('product.datatable');
    Route::get('/project', [ProjectController::class, 'datatable'])->name('project.datatable');
    Route::get('/project-category', [ProjectCategoryController::class, 'datatable'])->name('project-category.datatable');
    Route::get('/blog-category', [BlogCategoryController::class, 'datatable'])->name('blog-category.datatable');
    Route::get('/service', [ServiceController::class, 'datatable'])->name('service.datatable');
    Route::get('/slider', [SliderController::class, 'datatable'])->name('slider.datatable');
    Route::get('/team', [TeamController::class, 'datatable'])->name('team.datatable');
    Route::get('/testimonial', [TestimonialController::class, 'datatable'])->name('testimonial.datatable');
    Route::get('/counter', [CounterController::class, 'datatable'])->name('counter.datatable');
    Route::get('/client', [ClientController::class, 'datatable'])->name('client.datatable');
    Route::get('/job-category', [JobCategoryController::class, 'datatable'])->name('job-category.datatable');
    Route::get('/job', [JobController::class, 'datatable'])->name('job.datatable');
    Route::get('/application', [ApplicationController::class, 'datatable'])->name('application.datatable');
    Route::get('/hiring-application', [HiringApplicationController::class, 'datatable'])->name('hiring-application.datatable');
    Route::get('/feedback', [FeedbackController::class, 'datatable'])->name('feedback.datatable');
    Route::get('/address', [AddressController::class, 'datatable'])->name('address.datatable');
    Route::get('/role', [RoleController::class, 'datatable'])->name('role.datatable');
    Route::get('/user', [UserController::class, 'datatable'])->name('user.datatable');
});

Route::post('ckeditor/image_upload', [Dashboard::class, 'upload'])->name('upload');

Route::get('clients', [ClientsController::class, 'index'])->name('clients.index');

Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('blog/{slug}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServicesController::class, 'details'])->name('services.details');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
Route::get('/our-reach', [OurReachController::class, 'index'])->name('our-reach.index');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');

Route::get('projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('projects/{slug}', [ProjectsController::class, 'details'])->name('projects.details');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('career.show');
Route::post('/job-apply', [CareerController::class, 'submit_application'])->name('careers.submit_application');

Route::get('/hirepro', [HireProController::class, 'index'])->name('hirepro.index');
Route::POST('/hirepro-application', [HireProController::class, 'submit_application'])->name('hirepro.submit_application');

Route::post('/get-technologies-options', [HomeController::class, 'getTechnologies'])->name('get.technologies');

Route::any('/{slug}', [HomeController::class, 'pages']);
