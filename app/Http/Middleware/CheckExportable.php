<?php

namespace App\Http\Middleware;

use App\Http\Traits\Quota;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class CheckExportable
{
    use Quota;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::user()->id;
        if($this->CheckExportable($user_id)){
            return $next($request);
        }
        else{
            return redirect()->route('plan.show')->with('danger','Please update your plan!');
        }
    }
}
