<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RedirectRoutes
{
    /**
     * The redirect routes.
     *
     * @var array
     */
    protected $redirectRoutes = [
        'pages/web-design-development' => 'services/web-development',
        'services/digital-marketing' => 'services',
        'services/android-app-development' => 'services/mobile-development',
        'services/wordpress-development' => 'services/web-development',
        'services/web-design-development' => 'services/web-development',
        'owners-pos' => 'portfolio/owners-pos',
        'pages/owners-pos' => 'portfolio/owners-pos',
        'technology-blogs' => 'blogs',
        'project/gaming-shop' => 'portfolio',
        'project/the-ocular-store' => 'portfolio',
        'project/khan-muezzin' => 'portfolio',
        'project/global-system-of-integrated-studies' => 'portfolio',
        'project/zaidi-traders' => 'portfolio',
        'project/the-fusion-brand' => 'portfolio',
        'project/hon-e-honey-eat-nature-honey' => 'portfolio',
        'project/skytek' => 'portfolio',
        'project/ns-enterprises' => 'portfolio',
        'blog/top-10-software-house-in-islamabad' => 'blogs',
        // 'clients' => '/',
        'testimonial' => '/',
        'services/portfolio-page-background-video.html' => '/',
        'services/portfolio-page-particles.html' => '/',
        'project/ask-international' => 'blogs',
        'project/builder-mart' => 'portfolio',
        'team/1' => 'hirepro',
        'team/2' => 'hirepro',
        'careers/19' => 'careers',
        'careers/18' => 'careers',
        'careers/17' => 'careers',
        'careers/16' => 'careers',
        'careers/15' => 'careers',
        'blog' => 'blogs',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();

        if (array_key_exists($path, $this->redirectRoutes)) {
            $redirectTo = $this->redirectRoutes[$path];

            return redirect($redirectTo);
        }

        return $next($request);
    }
}
