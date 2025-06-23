<?php

namespace App\Http\Middleware;

use App\Http\Traits\Quota;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class CheckCardDesignCount
{
    use Quota;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->parent_user != null && $user->parent_user != "") {
            $user_id = $user->parent_user;
        } else {
            $user_id = $user->id;
        }
        if ($this->CheckCardDesignCount($user_id)) {
            return $next($request);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'You are reached your limit, please upgrade your plan'
            ], 422);
        }
    }
}
