<?php
/**
 * Routing Filters - all standard Routing Filters are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    //
});


App::after(function($request, $response)
{
    //
});

/** Define Route Filters. */

// The CSRF Filter.
Route::filter('csrf', function($route, $request) {
    $session = $request->session();

    $ajaxRequest = $request->ajax();

    $token = $ajaxRequest ? $request->header('X-CSRF-Token') : $request->input('csrfToken');

    if ($session->token() == $token) {
        //
    }

    // The CSRF Token is invalid, respond with Error 400 (Bad Request)
    else if ($ajaxRequest) {
        return Response::make('Bad Request', 400);
    } else {
        return Response::error(400);
    }
});

// Referer checking Filter.
Route::filter('referer', function($route, $request) {
    // Check if the visitor come to this Route from another site.
    $referer = $request->header('referer');

    if(! str_starts_with($referer, Config::get('app.url'))) {
        // When Referrer is invalid, respond with Error 400 Page (Bad Request)
        return Response::error(400);
    }
});

// Authentication Filters.
Route::filter('auth', function($route, $request) {
    if (Auth::check()) {
        //
    }

    // User is not authenticated.
    else if (! $request->ajax()) {
         return Redirect::guest('login');
    } else {
        return Response::make('Unauthorized Access', 403);
    }
});

Route::filter('auth.basic', function()
{
    return Auth::basic();
});

Route::filter('guest', function($route, $request) {
    if (Auth::guest()) {
        //
    }

    // User is authenticated.
    else if (! $request->ajax()) {
         return Redirect::guest('admin/dashboard');
    } else {
        return Response::make('Unauthorized Access', 403);
    }
});

// Role-based Authorization Filter.
Route::filter('roles', function($route, $request, $response, $roles = null) {
    if (! is_null($roles) && Auth::check()) {
        $user = Auth::user();

        if (! $user->hasRole($roles)) {
            $status = __('You are not authorized to access this resource.');

            return Redirect::to('admin/dashboard')->withStatus($status, 'warning');
        }
    }
});
