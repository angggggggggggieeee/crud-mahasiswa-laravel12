<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekEmailIkmi
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $email = Auth::user()->email;

            if (str_ends_with($email, '@ikmi.ac.id')) {
                return $next($request);
            }
        }

        return redirect()->back()->with('error', 
            'Hanya user dengan email @ikmi.ac.id yang dapat menghapus data.');
    }
}