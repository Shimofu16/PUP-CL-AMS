<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AlertMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->session()->has('successAlert')) {
            Alert::success('SYSTEM MESSAGE', $request->session()->get('successAlert'))
                ->autoClose(5000)
                ->animation('animate__fadeIn', 'animate__fadeOut')
                ->timerProgressBar();
        }
        if ($request->session()->has('errorAlert')) {
            Alert::error('SYSTEM MESSAGE', $request->session()->get('errorAlert'))
                ->autoClose(5000)
                ->animation('animate__fadeIn', 'animate__fadeOut')
                ->timerProgressBar();
        }
        if ($request->session()->has('warningAlert')) {
            Alert::warning('SYSTEM MESSAGE', $request->session()->get('warningAlert'))
                ->autoClose(5000)
                ->animation('animate__fadeIn', 'animate__fadeOut')
                ->timerProgressBar();
        }
        if ($request->session()->has('infoAlert')) {
            Alert::info('Info', $request->session()->get('infoAlert'))
                ->autoClose(5000)
                ->animation('animate__fadeIn', 'animate__fadeOut')
                ->timerProgressBar();
        }
        if ($request->session()->has('questionAlert')) {
            Alert::question('SYSTEM MESSAGE', $request->session()->get('questionAlert'))
                ->autoClose(5000)
                ->animation('animate__fadeIn', 'animate__fadeOut')
                ->timerProgressBar();
        }
        if ($request->session()->has('successToast')) {
            toast()->success('SYSTEM MESSAGE', $request->session()->get('successToast'))
                ->autoClose(5000)
                ->animation('animate__fadeInRight', 'animate__fadeOutRight')
                ->timerProgressBar();
        }
        if ($request->session()->has('errorToast')) {
            toast()->error('SYSTEM MESSAGE', $request->session()->get('errorToast'))
                ->autoClose(5000)
                ->animation('animate__fadeInRight', 'animate__fadeOutRight')
                ->timerProgressBar();
        }
        if ($request->session()->has('warningToast')) {
            toast()->warning('SYSTEM MESSAGE', $request->session()->get('warningToast'))
                ->autoClose(5000)
                ->animation('animate__fadeInRight', 'animate__fadeOutRight')
                ->timerProgressBar();
        }
        if ($request->session()->has('infoToast')) {
            toast()->info('Info', $request->session()->get('infoToast'))
                ->autoClose(5000)
                ->animation('animate__fadeInRight', 'animate__fadeOutRight')
                ->timerProgressBar();
        }
        if ($request->session()->has('questionToast')) {
            toast()->question('SYSTEM MESSAGE', $request->session()->get('questionToast'))
                ->autoClose(5000)
                ->animation('animate__fadeInRight', 'animate__fadeOutRight')
                ->timerProgressBar();
        }

        return $next($request);
    }
}
