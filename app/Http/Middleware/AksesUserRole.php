<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Route;

class AksesUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();


            if(in_array($currentRouteName, $this->userAccesRole()[$userRole]))
            {
                return $next($request);
            }else{
                abort(403,'Unauthorized action.');
            }
        } catch (\Throwable $th) {
            abort(403,'Unauthorized action.');
        }



    }

    private function userAccesRole()
    {
        return [
            'user'=>[
                'dashboard',
                'turnamen',

            ],
            'admin'=>[
                'dashboard',
                'student.index',
                'student.create',
                'student.store',
                'student.edit',
                'student.update',
                'student.destroy',
                '/cari?search',
                'coach',
                'turnamen',
            ]
         ];
    }
}
