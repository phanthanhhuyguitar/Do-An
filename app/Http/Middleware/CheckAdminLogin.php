<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $route = Route::currentRouteName();
//        if($route === 'admin.login'){
//            if($this->checkSessionAdmin()){
//                //khi da dang nhap roi
//                return redirect(route('admin.dashboard'));
//            }
//        }else{
//            if(!$this->checkSessionAdmin()){
//                //quay lai trang dang nhap
//                return redirect(route('admin.login'));
//            }
//        }
        if(Auth::check()){
            $user = Auth::user();
            if($user->level === 0){
                return $next($request);
            }else{
                return redirect(route('admin.login'));
            }
        }else{
            return redirect(route('admin.login'));
        }

    }

//    public function checkSessionAdmin()
//    {
//        $idSession = Session::get('id');
//        $email = Session::get('email');
//        if(is_numeric($idSession) && !empty($email)){
//            return true;
//        }
//        return false;
//    }
}
